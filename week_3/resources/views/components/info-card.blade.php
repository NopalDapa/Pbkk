{{-- Komponen kartu informasi: $title (prop), slot = isi kartu --}}
<div {{ $attributes->merge(['class' => 'card shadow-sm mb-4 h-100']) }}>
    <div class="card-header bg-primary text-white fw-semibold">{{ $title }}</div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
