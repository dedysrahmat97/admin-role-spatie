<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-outline btn-primary btn-lg focus:bg-gray-700 active:bg-gray-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
