<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .loading {
            content: '';
            position: absolute;
            top: 50%;
            right: -90%;
            width: 24px;
            height: 24px;
            margin-top: -8px;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-top-color: #3498db;
            /* atau sesuaikan dengan warna tema kamu */
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            z-index: 10;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased overflow-x-hidden">
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col bg-base-200 text-base-content min-h-screen">


            <!-- Page content here -->

            <div class="mt-5 mx-4">
                {{ $slot }}
            </div>
        </div>
        <div class="drawer-side z-40">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <!-- Sidebar content here -->
            @include('partials.backend.sidebar')
        </div>
    </div>
    @livewireScripts
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const darkMode = localStorage.getItem('darkMode') === 'true';
            document.documentElement.setAttribute('data-theme', darkMode ? 'luxury' : 'corporate');
        });
    </script>
</body>

</html>
