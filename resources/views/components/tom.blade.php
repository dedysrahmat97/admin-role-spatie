@props(['disabled' => false])

<div wire:ignore>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'select select-accent select-lg bg-base-100 select-bordered w-full shadow-md border border-accent focus:border-accent focus:ring-accent focus:outline-hidden rounded-md shadow-xs',
    ]) !!}>
        {{ $slot }}
    </select>
</div>
