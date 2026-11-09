<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardRbacTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    private function account(string $role): User
    {
        return User::where('email', strtolower($role).'@portal.test')->firstOrFail();
    }

    public function test_guests_cannot_open_backoffice_or_delete_data(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
        $this->get('/mahasiswa')->assertRedirect('/login');
        $this->delete('/mahasiswa/1')->assertRedirect('/login');
        $this->assertDatabaseCount('mahasiswa', 50);
    }

    public function test_all_student_pages_require_login_and_use_adminlte_after_login(): void
    {
        foreach (['tentang', 'profil', 'ide-agent'] as $page) {
            $this->get('/mahasiswa/1/'.$page)->assertRedirect('/login');
        }
        $this->get('/')->assertRedirect('/login');
        $this->actingAs($this->account('Staf'))->get('/')->assertRedirect('/dashboard');
        foreach (['tentang', 'profil', 'ide-agent'] as $page) {
            $this->get('/mahasiswa/1/'.$page)->assertOk()->assertSee('main-sidebar', false)
                ->assertSee('vendor/adminlte/dist/css/adminlte.min.css', false);
        }
        foreach (['/tentang', '/profil-mahasiswa', '/ide-agent'] as $legacyUrl) {
            $this->get($legacyUrl)->assertRedirect('/mahasiswa');
        }
        $user = $this->account('Staf');
        $user->forceFill(['email_verified_at' => null])->save();
        $this->actingAs($user)->get('/mahasiswa/1/tentang')->assertRedirect('/verify-email');
    }

    public function test_student_details_are_isolated_and_idea_page_has_no_submission_form(): void
    {
        $first = Mahasiswa::first();
        $second = Mahasiswa::where('id', '!=', $first->id)->first();
        $first->update(['tentang' => 'Biografi Mahasiswa Pertama', 'ide_judul' => 'Agent Pertama', 'minat' => '<script>alert(1)</script>']);
        $second->update(['tentang' => 'Biografi Mahasiswa Kedua', 'ide_judul' => 'Agent Kedua']);
        $this->actingAs($this->account('Staf'))->get('/mahasiswa?q='.$first->nrp)->assertOk()
            ->assertSee(route('mahasiswa.tentang', $first), false)
            ->assertSee(route('mahasiswa.profil', $first), false)
            ->assertSee(route('mahasiswa.ide-agent', $first), false);
        $this->get('/mahasiswa/'.$first->id.'/tentang')->assertOk()
            ->assertSee('Biografi Mahasiswa Pertama')->assertDontSee('Biografi Mahasiswa Kedua');
        $this->get('/mahasiswa/'.$second->id.'/tentang')->assertSee('Biografi Mahasiswa Kedua');
        $this->get('/mahasiswa/'.$first->id.'/profil')->assertSee($first->email)
            ->assertSee('&lt;script&gt;', false)->assertDontSee('<script>alert(1)</script>', false);
        $this->get('/mahasiswa/'.$first->id.'/ide-agent')->assertSee('Agent Pertama')
            ->assertDontSee('Agent Kedua')->assertDontSee('Kirim Ide')->assertDontSee('Formulir Pengumpulan');
        foreach (['tentang', 'profil', 'ide-agent'] as $page) {
            $this->get('/mahasiswa/999999/'.$page)->assertNotFound();
        }
    }

    public function test_admin_can_save_profile_and_idea_fields_and_they_are_validated(): void
    {
        $details = [
            'email' => 'mahasiswa@example.test', 'tentang' => 'Tentang mahasiswa uji',
            'minat' => 'Laravel dan keamanan', 'ide_judul' => 'Agent Jadwal Kuliah',
            'ide_deskripsi' => 'Membantu mengatur jadwal kuliah.', 'ide_alur' => 'Masukkan jadwal lalu lihat rekomendasi.',
        ];
        $this->actingAs($this->account('Admin'))->post('/mahasiswa', $this->mahasiswaData($details))
            ->assertSessionHasNoErrors()->assertRedirect('/mahasiswa');
        $student = Mahasiswa::where('nrp', '5025249999')->firstOrFail();
        $this->assertDatabaseHas('mahasiswa', array_merge(['id' => $student->id], $details));
        $this->put('/mahasiswa/'.$student->id, $this->mahasiswaData(['email' => 'invalid', 'ide_judul' => str_repeat('x', 256)]))
            ->assertSessionHasErrors(['email', 'ide_judul']);
        $this->put('/mahasiswa/'.$student->id, $this->mahasiswaData(array_merge($details, ['ide_judul' => 'Ide Diperbarui'])))
            ->assertSessionHasNoErrors()->assertRedirect('/mahasiswa');
        $this->get('/mahasiswa/'.$student->id.'/ide-agent')->assertSee('Ide Diperbarui');
    }

    public function test_unverified_and_roleless_users_cannot_open_dashboard(): void
    {
        $user = User::factory()->unverified()->create();
        $this->actingAs($user)->get('/dashboard')->assertRedirect('/verify-email');
        $user->forceFill(['email_verified_at' => now()])->save();
        $this->get('/dashboard')->assertForbidden();
    }

    public function test_dashboard_widgets_show_database_counts_for_both_roles(): void
    {
        foreach (['Admin', 'Staf'] as $role) {
            $this->actingAs($this->account($role))->get('/dashboard')->assertOk()
                ->assertViewHas('totalMahasiswa', 50)
                ->assertViewHas('totalPengguna', 2)
                ->assertViewHas('totalPeran', 2);
        }
    }

    public function test_admin_can_see_delete_buttons_and_delete_data(): void
    {
        $this->actingAs($this->account('Admin'))->get('/mahasiswa')
            ->assertOk()->assertSee('Hapus Data');
        $this->delete('/mahasiswa/1')->assertRedirect('/mahasiswa');
        $this->assertDatabaseMissing('mahasiswa', ['id' => 1]);
    }

    private function mahasiswaData(array $overrides = []): array
    {
        return array_replace([
            'nrp' => '5025249999', 'nama' => 'Mahasiswa Uji',
            'prodi' => 'Teknik Informatika', 'angkatan' => (int) date('Y'),
        ], $overrides);
    }

    public function test_admin_can_create_and_update_mahasiswa(): void
    {
        $this->actingAs($this->account('Admin'))->get('/mahasiswa')
            ->assertSee('Tambah Mahasiswa')->assertSee('Edit');
        $this->get('/mahasiswa/create')->assertOk();
        $this->post('/mahasiswa', $this->mahasiswaData())->assertRedirect('/mahasiswa');
        $record = Mahasiswa::where('nrp', '5025249999')->firstOrFail();
        $this->get('/mahasiswa/'.$record->id.'/edit')->assertOk()->assertSee('Mahasiswa Uji');
        $this->put('/mahasiswa/'.$record->id, $this->mahasiswaData(['nama' => 'Nama Diperbarui']))
            ->assertSessionHasNoErrors()->assertRedirect('/mahasiswa');
        $this->assertDatabaseHas('mahasiswa', ['id' => $record->id, 'nama' => 'Nama Diperbarui']);
        $this->get('/dashboard')->assertViewHas('totalMahasiswa', 51);
    }

    public function test_staff_cannot_create_or_update_even_with_direct_permissions(): void
    {
        $user = $this->account('Staf');
        $user->givePermissionTo(['mahasiswa.tambah', 'mahasiswa.ubah']);
        $this->actingAs($user)->get('/mahasiswa')->assertDontSee('Tambah Mahasiswa')->assertDontSee('>Edit<', false);
        $this->get('/mahasiswa/create')->assertForbidden();
        $this->get('/mahasiswa/1/edit')->assertForbidden();
        $this->post('/mahasiswa', $this->mahasiswaData())->assertForbidden();
        $this->put('/mahasiswa/1', $this->mahasiswaData())->assertForbidden();
        $this->assertDatabaseCount('mahasiswa', 50);
        $this->assertDatabaseMissing('mahasiswa', ['nama' => 'Mahasiswa Uji']);
    }

    public function test_guests_cannot_create_or_update_mahasiswa(): void
    {
        $this->get('/mahasiswa/create')->assertRedirect('/login');
        $this->get('/mahasiswa/1/edit')->assertRedirect('/login');
        $this->post('/mahasiswa', $this->mahasiswaData())->assertRedirect('/login');
        $this->put('/mahasiswa/1', $this->mahasiswaData())->assertRedirect('/login');
        $this->assertDatabaseCount('mahasiswa', 50);
    }

    public function test_create_and_update_validate_required_fields_and_unique_nrp(): void
    {
        $record = Mahasiswa::first();
        $this->actingAs($this->account('Admin'))->post('/mahasiswa', [])
            ->assertSessionHasErrors(['nrp', 'nama', 'prodi', 'angkatan']);
        $this->post('/mahasiswa', $this->mahasiswaData(['nrp' => $record->nrp]))->assertSessionHasErrors('nrp');
        $this->post('/mahasiswa', $this->mahasiswaData(['nrp' => 'abc', 'angkatan' => 9999]))
            ->assertSessionHasErrors(['nrp', 'angkatan']);
        $other = Mahasiswa::where('id', '!=', $record->id)->first();
        $this->put('/mahasiswa/'.$record->id, $this->mahasiswaData(['nrp' => $other->nrp]))
            ->assertSessionHasErrors('nrp');
        $this->assertDatabaseCount('mahasiswa', 50);
        $this->assertSame($record->nrp, $record->fresh()->nrp);
    }

    public function test_revoking_create_or_update_permission_blocks_admin(): void
    {
        $user = $this->account('Admin');
        $user->roles->first()->revokePermissionTo(['mahasiswa.tambah', 'mahasiswa.ubah']);
        $this->actingAs($user)->get('/mahasiswa/create')->assertForbidden();
        $this->get('/mahasiswa/1/edit')->assertForbidden();
        $this->post('/mahasiswa', $this->mahasiswaData())->assertForbidden();
        $this->put('/mahasiswa/1', $this->mahasiswaData())->assertForbidden();
    }

    public function test_staff_cannot_see_delete_buttons_or_delete_via_url(): void
    {
        $this->actingAs($this->account('Staf'))->get('/mahasiswa')
            ->assertOk()->assertDontSee('Hapus Data');
        $this->delete('/mahasiswa/1')->assertForbidden();
        $this->assertDatabaseHas('mahasiswa', ['id' => 1]);
    }

    public function test_delete_permission_alone_does_not_make_staff_admin(): void
    {
        $user = $this->account('Staf');
        $user->givePermissionTo('mahasiswa.hapus');
        $this->actingAs($user)->get('/mahasiswa')->assertDontSee('Hapus Data');
        $this->delete('/mahasiswa/1')->assertForbidden();
    }

    public function test_mixed_admin_and_staff_roles_cannot_delete(): void
    {
        $user = $this->account('Admin');
        $user->assignRole('Staf');
        $this->actingAs($user)->get('/mahasiswa')->assertDontSee('Hapus Data');
        $this->delete('/mahasiswa/1')->assertForbidden();
    }

    public function test_revoked_database_permission_blocks_delete_immediately(): void
    {
        $user = $this->account('Admin');
        $user->roles->first()->revokePermissionTo('mahasiswa.hapus');
        $this->actingAs($user)->delete('/mahasiswa/1')->assertForbidden();
    }

    public function test_search_filters_results_and_preserves_keyword_on_next_page(): void
    {
        Mahasiswa::factory(12)->create(['nama' => 'Uji Pencarian']);
        $response = $this->actingAs($this->account('Staf'))->get('/mahasiswa?q=Uji%20Pencarian');
        $response->assertOk()->assertViewHas('mahasiswa', function ($rows) {
            return $rows->total() === 12 && $rows->count() === 10
                && str_contains($rows->nextPageUrl(), 'q=Uji%20Pencarian');
        });
        $this->get('/mahasiswa?q=Uji%20Pencarian&page=2')->assertOk()
            ->assertViewHas('mahasiswa', fn ($rows) => $rows->count() === 2);
        $row = Mahasiswa::first();
        $this->get('/mahasiswa?q='.$row->nrp)->assertOk()
            ->assertViewHas('mahasiswa', fn ($rows) => $rows->total() === 1);
        $this->get('/mahasiswa?q=tidak-ada-hasil')->assertSee('Data mahasiswa tidak ditemukan.');
        $this->get('/mahasiswa?q=')->assertOk()
            ->assertViewHas('mahasiswa', fn ($rows) => $rows->total() === 62);
    }

    public function test_demo_login_works_for_both_accounts_only_when_enabled_locally(): void
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $this->app->instance('env', 'local');
        config(['demo.enabled' => true]);
        foreach (['Admin', 'Staf'] as $role) {
            $this->post('/demo-login/'.$role)->assertRedirect('/dashboard');
            $this->assertAuthenticatedAs($this->account($role));
            $this->post('/logout');
        }
        $this->post('/demo-login/Unknown')->assertNotFound();
        config(['demo.enabled' => false]);
        $this->post('/demo-login/Admin')->assertNotFound();
        config(['demo.enabled' => true]);
        $this->app->instance('env', 'production');
        $this->post('/demo-login/Admin')->assertNotFound();
        $this->assertGuest();
    }

    public function test_seeded_nrp_matches_enrollment_year_and_email(): void
    {
        $students = Mahasiswa::all();
        $this->assertCount(50, $students->pluck('nrp')->unique());
        foreach ($students as $student) {
            $this->assertMatchesRegularExpression('/^5025'.substr((string) $student->angkatan, -2).'[0-9]{4}$/', $student->nrp);
            $this->assertSame($student->nrp.'@student.its.ac.id', $student->email);
        }

        $student = Mahasiswa::factory()->create(['angkatan' => 2024]);
        $this->assertMatchesRegularExpression('/^502524[0-9]{4}$/', $student->nrp);
        $this->assertSame($student->nrp.'@student.its.ac.id', $student->email);
    }

    public function test_seeder_can_run_again_without_duplicate_accounts_or_data(): void
    {
        $this->seed();
        $this->assertDatabaseCount('users', 2);
        $this->assertDatabaseCount('roles', 2);
        $this->assertDatabaseCount('permissions', 4);
        $this->assertDatabaseCount('mahasiswa', 50);
    }
}
