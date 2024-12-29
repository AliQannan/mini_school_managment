<x-app-layout>

    @slot('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Home Work') }}
    </h2>
@endslot 

@section('mainContent')
 <!-- Homework Section -->
 <div class="py-6 px-3">
    <h2 class="text-xl font-semibold text-gray-800">Homework Assignments</h2>
    
    <!-- Homework Cards or List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <!-- Example Homework Card 1 -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-48 object-cover rounded-t-lg" src="https://via.placeholder.com/300" alt="Homework Image">
            <div class="p-4">
                <h3 class="font-semibold text-lg text-gray-800">Math Homework</h3>
                <p class="text-gray-600 mt-2">Solve the following math problems by the end of this week.</p>
                <div class="mt-4">
                    <a href="#" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">View Details</a>
                </div>
            </div>
        </div>

        <!-- Example Homework Card 2 -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
            <img class="w-full h-48 object-cover rounded-t-lg" src="https://via.placeholder.com/300" alt="Homework Image">
            <div class="p-4">
                <h3 class="font-semibold text-lg text-gray-800">Science Homework</h3>
                <p class="text-gray-600 mt-2">Research and submit a report on the environment.</p>
                <div class="mt-4">
                    <a  href="#"class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">View Details</a>
                </div>
            </div>
        </div>

        <!-- Add more homework cards as needed -->
    </div>
</div>

@endsection


</x-app-layout>