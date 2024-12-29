



<x-app-layout>
    @slot('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Materials') }}
    </h2>
@endslot
@section('mainContent')

<h2 class="text-2xl font-bold mb-4">Edit Material</h2>

<form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $material->title) }}" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $material->description) }}</textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- File Upload -->
    <div>
        <label for="file" class="block text-sm font-medium text-gray-700">File (optional)</label>
        <input type="file" name="file" id="file"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @if($material->file_path)
            <p class="mt-2 text-sm text-gray-600">Current file: <a href="{{ asset($material->file_path) }}" target="_blank" class="text-blue-500 hover:underline">Download</a></p>
        @endif
        @error('file')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Update Material
        </button>
    </div>
</form>
    <p class="text-gray-700">Use this form to edit the selected course material.</p>
@endsection

    
</x-app-layout>