<x-app-layout>
    @section('mainContent')
        
    <!-- Quiz Section -->
    <div class="p-0">
        <h2 class="text-xl font-semibold text-gray-800">{{ $quiz->title }}</h2>
        
        <!-- Quiz Instructions -->
        <div class="mt-4">
            <p class="text-gray-600">{{ $quiz->description }}</p>
        </div>

        <!-- Show score if available -->
        @if(session('score') !== null)
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                You scored {{ session('score') }} out of {{ session('totalQuestions') }}.
            </div>
        @endif

        <!-- Quiz Questions -->
        <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
            @csrf
            <div class="mt-6 space-y-6">
                @foreach($quiz->questions as $index => $question)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
                        <p class="font-semibold text-gray-800">{{ $index + 1 }}. {{ $question->question }}</p>
                        <div class="mt-4 space-y-3">
                            @if(count($question->answers) === 1)
                                <input type="text" name="q{{ $index + 1 }}" value="{{ old('q' . ($index + 1)) }}" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       @if(session('userAnswers'))
                                           readonly style="color:{{ session('userAnswers')[$index] == $question->answers->first()->answer && !$question->answers->first()->is_correct ? 'red' : '' }}; {{ $question->answers->first()->is_correct ? 'green' : '' }}"
                                       @endif />
                            @else
                                @foreach($question->answers as $answer)
                                    <label class="flex items-center">
                                        <input type="radio" name="q{{ $index + 1 }}" value="{{ $answer->answer }}" class="form-radio h-4 w-4 text-blue-500"
                                               @if(session('userAnswers') && session('userAnswers')[$index] == $answer->answer)
                                                    checked
                                               @endif
                                               @if(session('userAnswers'))
                                                    disabled
                                               @endif>
                                        <span class="ml-2
                                                     @if(session('userAnswers'))
                                                         {{ session('userAnswers')[$index] == $answer->answer && !$answer->is_correct ? 'text-red-500' : '' }}
                                                         {{ $answer->is_correct ? 'text-green-500' : '' }}
                                                     @endif">{{ $answer->answer }}</span>
                                    </label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Submit Button -->
                <div class="mt-6">
                    @if(session('userAnswers'))
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" disabled>Quiz Submitted</button>
                    @else
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">
                            Submit Quiz
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>

    @endsection
</x-app-layout>
