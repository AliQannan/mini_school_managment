<x-app-layout>
    @slot('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Quizzes') }}
        </h2>
    @endslot
    
    @section('mainContent')

    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">All Quizzes</h2>
        
        @if(isset($message))
            <p class="text-gray-500">{{ $message }}</p>
        @elseif($quizzes->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($quizzes as $quiz)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 flex flex-col">
                        <h3 class="text-lg font-semibold mb-2">{{ $quiz->title }}</h3>
                        <p class="text-gray-600 flex-grow">{{ \Illuminate\Support\Str::limit($quiz->description, 100) }}</p>
                        
                        @php
                            $material = \App\Models\Material::where('quiz_id', $quiz->id)->first();
                        @endphp

                        @if(!$quiz->quiz_complete)
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200 text-center">Go to Quiz</a>
                        @elseif($quiz->quiz_complete)
                            <span class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md text-center">Completed</span>
                        @endif
                            @php
                                  $mark = \App\Models\Mark::where('user_id', auth()->id())->where('material_id', $material->id)->first();
                            @endphp
                        @if($material && $mark->score && $mark->score !== null)
                            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
                                Score: {{ $mark->score }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No quizzes available.</p>
        @endif
    </div>
    
    @endsection
</x-app-layout>
