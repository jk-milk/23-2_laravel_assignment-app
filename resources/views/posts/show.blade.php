@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="mt-4 mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h1>
            <p class="text-gray-600 dark:text-gray-300">Written by {{ $post->user->name }} on {{
                $post->created_at->format('Y-m-d') }}</p>
        </div>

        @if(Auth::check() && Auth::user()->id == $post->user->id)
        <div>
            <button onclick="location.href='{{ route('posts.edit', $post) }}'"
                class="bg-blue-500 text-white px-2 py-1 rounded mr-2">수정</button>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
                onsubmit="return confirm('정말 삭제하시겠습니까?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">삭제</button>
            </form>
        </div>
        @endif
    </div>

    

    <!-- 댓글 -->
    @if(Auth::check())
    <div class="mt-8">
        <form action="{{ route('comments.store', $post) }}" method="POST" class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
            @csrf
            <div class="flex flex-col space-y-4">
                <textarea name="body" class="bg-white dark:bg-gray-800 p-2 rounded-lg shadow w-full resize-none"></textarea>
                <button type="submit" class="self-end bg-blue-500 text-white px-4 py-2 rounded">댓글 추가</button>
            </div>
        </form>
    </div>
    @endif
    @foreach($post->comments as $comment)
    <div class="mt-4 bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
        <div class="flex justify-between items-center">
            <p class="mb-2">{{ $comment->user->name }}: {{ $comment->body }}</p>
            @if(Auth::check() && Auth::user()->id == $comment->user_id)
            <div>
                <button onclick="document.getElementById('edit-form-{{ $comment->id }}').style.display='block'"
                    class="bg-blue-500 text-white px-2 py-1 rounded mr-2">수정</button>
                <form id="edit-form-{{ $comment->id }}" action="{{ route('comments.update', $comment) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('PUT')
                    <textarea name="body"
                        class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">{{ $comment->body }}</textarea>
                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">댓글 수정</button>
                </form>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">삭제</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    @endforeach

    <a href="{{ route('posts.index') }}"
        class="text-blue-500 hover:text-blue-600 bg-gray-200 px-2 py-2 rounded-lg shadow-lg">글 목록으로</a>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow chessboard">
        <div class="prose dark:prose-dark max-w-none">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>


</div>
@endsection