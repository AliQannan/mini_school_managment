<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>School</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gray-100 text-gray-800">
    <header class="bg-stone-300 text-white">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Flex container for logo and school name -->
            <a class="flex items-center space-x-2" href="{{ route('dashboard') }}" wire:navigate>
                <!-- Smaller School Logo -->
                <x-application-logo class="block h-5 w-5 fill-current bg-white rounded-full" />
                <!-- School Name -->
                <p class="font-bold text-lg">Master School</p>
            </a>
    
            <!-- Navigation -->
            @if (Route::has('login'))
                <livewire:welcome.navigation class="flex space-x-4 text-sm font-medium" />
            @endif
        </div>
    </header>
    
    

    <main class="mt-8 h-screen flex flex-col justify-between">
        <!-- Content Section 1 -->
        <div class="bg-white rounded-lg shadow-md p-6 flex-grow">
            @yield('mainContent')
        </div>

    <footer class="bg-gray-800 text-gray-400 text-center py-4">
        <p>&copy; {{ date('Y') }} School Name. All rights reserved.</p>
    </footer>
        <!-- Content Section 2 -->
    </main>

</body>
</html>
