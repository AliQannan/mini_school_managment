<x-app-layout>

    @slot('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Settings') }}
    </h2>
@endslot 



@section('mainContent')


this is content for settings    
@endsection

</x-app-layout>