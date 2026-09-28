{{-- Komponen banner status notifikasi --}}
@props(['type' => 'info'])
<div {{ $attributes->merge(['class' => 'alert alert-'.$type.' shadow-sm']) }} role="alert">
    {{ $slot }}
</div>
