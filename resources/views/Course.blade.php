<x-app-layout>
    @slot('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materials') }}
        </h2>
    @endslot
    
    @section('mainContent')
    
    <h2 class="text-2xl font-bold mb-4">All Course Materials</h2>
    
    @if($materials->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($materials as $material)
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 flex flex-col">
                    <h3 class="text-lg font-semibold mb-2">{{ $material->title }}</h3>
                    <p class="text-gray-600 flex-grow">{{ \Illuminate\Support\Str::limit($material->description, 50) }}</p>
                    
                    @if($material->file_path)
                        <a href="{{ asset($material->file_path) }}" target="_blank" class="text-blue-500 hover:underline mt-4">Download</a>
                    @else
                        <span class="text-gray-500 mt-4">No file available</span>
                    @endif

                    @if($material->quiz_id)
                        @php
                            $quiz = \App\Models\Quiz::find($material->quiz_id);
                        @endphp
                        @if($quiz && !$quiz->quiz_complete)
                            <a href="{{ route('quizzes.show', $material->quiz_id) }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200 text-center">Go to Quiz</a>
                        @endif
                    @endif

                    <div class="flex mt-4 space-x-4">
                        <a href="{{ route('materials.edit', $material->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <button type="button" class="text-red-500 hover:underline" onclick="openDeleteModal({{ $material->id }})">Delete</button>
                        <form id="deleteForm-{{ $material->id }}" method="POST" action="{{ route('materials.destroy', $material->id) }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    <!-- Generate Certificate Button -->
                    @php
                        $mark = \App\Models\Mark::where('user_id', auth()->id())->where('material_id', $material->id)->first();
                    @endphp
                    @if( $mark && $mark->score >=60)
                        <a href="{{ route('certificate.generate', $material->id) }}" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-200 text-center">Generate Certificate</a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No materials available.</p>
    @endif
    
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded shadow-lg text-center w-full sm:w-auto">
            <h3 class="text-lg font-semibold mb-4">Are you sure?</h3>
            <p class="mb-6">You are about to delete this material. This action cannot be undone.</p>
            <div class="flex justify-center space-x-4">
                <button onclick="confirmDelete()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                <button onclick="closeDeleteModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
            </div>
        </div>
    </div>
    
    <!-- Success Notification -->
    @if(session('message'))
    <div id="successNotification" class="fixed bottom-4 right-4 text-white py-2 px-4 rounded-lg shadow-lg 
        {{ session('message') == 'Material deleted successfully.' ? 'bg-red-500' : 'bg-green-500' }}">
        <p>{{ session('message') }}</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('successNotification').classList.add('hidden');
        }, 3000);
    </script>
    @endif
    
    <p class="text-gray-700 mt-4">Here you can view, edit, or delete the course materials.</p>
    
    <script>
        let deleteId = null;
    
        function openDeleteModal(id) {
            deleteId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }
    
        function closeDeleteModal() {
            deleteId = null;
            document.getElementById('deleteModal').classList.add('hidden');
        }
    
        function confirmDelete() {
            if (deleteId) {
                const form = document.getElementById(`deleteForm-${deleteId}`);
                form.submit();
                closeDeleteModal();
            }
        }
    </script>
    
    @endsection
</x-app-layout>
