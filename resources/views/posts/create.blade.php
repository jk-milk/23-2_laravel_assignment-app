@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="mt-4 mb-8">
        <h1 class="text-xl font-bold">새 게시글 작성</h1>
    </div>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="title" class="block mb-2">제목</label>
            <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="body" class="block mb-2">내용</label>
            <textarea name="body" id="body" rows="5" class="border border-gray-400 p-2 w-full" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">게시글 작성</button>
        </div>
    </form>
</div>
@endsection
