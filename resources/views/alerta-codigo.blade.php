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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">

    <!-- Alert Container -->
    <div class="bg-white dark:bg-gray-800 p-12 rounded-lg shadow-lg max-w-2xl mx-auto text-center">
        <h2 class="text-5xl font-bold text-gray-800 dark:text-white mb-8">{{ __('Registro exitoso') }}</h2>
        <p class="text-xl text-gray-600 dark:text-gray-300 mb-4">{{ __('Su código asignado es:') }}</p>
        <p class="text-6xl font-bold text-blue-600 mb-8">{{ session('codigo_usuario') }}</p>

        <form method="GET" action="{{ route('dashboard') }}">
            <x-button type="submit" class="px-10 py-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md text-2xl">
                {{ __('Continuar') }}
            </x-button>
        </form>
    </div>

    @livewireScripts
</body>
</html>
