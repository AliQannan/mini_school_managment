<x-app-layout>
    <x-slot name="header" class="w-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header ?? __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @yield('dashboardContent')
                </div>
            </div>

            <main class="container  border border-gray-100 shadow-md rounded-lg mt-2 px-4 py-4 h-auto">
                @yield('mainContent')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} Bit. All rights reserved.</p>
            <div class="mt-2">
                <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a> | 
                <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
            </div>
        </div>
    </footer>
</x-app-layout>
