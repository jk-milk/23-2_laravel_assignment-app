@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="mt-4 mb-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">글 수정하기</h1>
    </div>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-white">제목</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="{{ old('title', $post->title) }}" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:text-gray-300 dark:border-gray-700 dark:bg-gray-900"
                required>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-gray-700 dark:text-white">내용</label>
            <textarea 
                id="body" 
                name="body" 
                rows="10"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:text-gray-300 dark:border-gray-700 dark:bg-gray-900"
                required>{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">수정하기</button>
        </div>
    </form>
</div>
@endsection
