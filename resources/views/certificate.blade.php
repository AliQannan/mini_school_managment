<x-app-layout>
    @slot('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certificate') }}
        </h2>
    @endslot

    @section('mainContent')

    <div class="p-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Certificate of Achievement</h1>
        <p class="text-xl mb-6">This is to certify that</p>
        <p class="text-2xl font-semibold">{{ auth()->user()->name }}</p>
        <p class="text-xl mb-6">has successfully completed the material</p>
        <p class="text-2xl font-semibold">{{ $material->title }}</p>
        <p class="text-xl mb-6">with a total score of</p>
        <p class="text-2xl font-semibold">{{ $totalScore }}</p>
        <p class="text-xl mt-8">Congratulations!</p>
    </div>

    @endsection
</x-app-layout>
