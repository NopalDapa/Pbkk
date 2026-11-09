{{-- Komponen kartu informasi: $title (prop), slot = isi kartu --}}
<div {{ $attributes->merge(['class' => 'card shadow-sm mb-4']) }}>
    <div class="card-header bg-primary text-white font-weight-bold">{{ $title }}</div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
