@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="mt-4 mb-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h1>
        <p class="text-gray-600 dark:text-gray-300">Written by {{ $post->user->name }} on {{
            $post->created_at->format('Y-m-d') }}</p>
    </div>

    <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-600">글 목록 보기</a>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow chessboard">
        <div class="prose dark:prose-dark max-w-none">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>

    @if(Auth::check() && Auth::user()->id == $post->user->id)
    <div class="mt-4">
        <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">수정</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline"
            onsubmit="return confirm('정말 삭제하시겠습니까?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">삭제</button>
        </form>
    </div>
    @endif

    <!-- 댓글 -->
    @if(Auth::check())
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="body"></textarea>
        <button type="submit">댓글 추가</button>
    </form>
    @endif
    @foreach($post->comments as $comment)
    <p>{{ $comment->user->name }}: {{ $comment->body }}</p>
    @if(Auth::check() && Auth::user()->id == $comment->user_id)
    <button onclick="document.getElementById('edit-form-{{ $comment->id }}').style.display='block'">댓글 수정</button>
    <form id="edit-form-{{ $comment->id }}" action="{{ route('comments.update', $comment) }}" method="POST"
        style="display: none;">
        @csrf
        @method('PUT')
        <textarea name="body">{{ $comment->body }}</textarea>
        <button type="submit">댓글 수정</button>
    </form>
    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">댓글 삭제</button>
    </form>
    @endif
    @endforeach


</div>
@endsection