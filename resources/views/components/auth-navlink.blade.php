@props(['selected'])

@php
    $classes = $selected ?? false ? 'menu-list-item auth selected' : 'menu-list-item auth';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
