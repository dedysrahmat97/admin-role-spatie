@props(['disabled' => false])

<div wire:ignore>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => '',
    ]) !!}>
        {{ $slot }}
    </select>
</div>
