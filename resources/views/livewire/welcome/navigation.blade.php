<nav class="flex flex-col md:flex-row md:justify-end gap-2">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-lg px-4 py-2 text-white bg-blue-600 shadow-md ring-1 ring-transparent transition duration-300 ease-in-out 
                   hover:bg-blue-700 hover:shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-300 text-center md:text-left w-full md:w-auto"
        >
        Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-lg px-4 py-2 text-white bg-yellow-500 shadow-md ring-1 ring-transparent transition duration-300 ease-in-out 
                   hover:bg-yellow-600 hover:shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-300 text-center md:text-left w-full md:w-auto"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-lg px-4 py-2 text-white bg-green-600 shadow-md ring-1 ring-transparent transition duration-300 ease-in-out 
                   hover:bg-green-700 hover:shadow-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-green-300 text-center md:text-left w-full md:w-auto"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
