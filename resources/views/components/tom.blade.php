@props(['disabled' => false])

<div wire:ignore>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'input input-accent input-lg bg-base-100 input-bordered w-full shadow-md border border-accent focus:border-accent focus:ring-accent focus:outline-hidden rounded-md shadow-xs',
    ]) !!}>
        {{ $slot }}
    </select>
</div>
