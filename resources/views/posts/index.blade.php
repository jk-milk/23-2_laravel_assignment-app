@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="mt-4 mb-8 flex justify-between items-center">
        <h1 class="text-xl font-bold">게시물</h1>
        <a href="{{ Auth::check() ? route('posts.create') : route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            글쓰기
        </a>
    </div>

    @if (session('status'))
        <div class="bg-green-500 text-white px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-8">
        <div class="font-bold border-b-2 border-gray-300 pb-2 flex">
            <span class="w-1/12 text-center">번호</span>
            <span class="w-3/12">제목</span>
            <span class="w-2/12">작성자</span>
            <span class="w-3/12">생성 일시</span>
            <span class="w-2/12">댓글 수</span>
        </div>
        @forelse ($posts->sortByDesc('created_at') as $index => $post)
            <div class="border-b border-gray-300 py-2 flex items-center">
                <span class="w-1/12 text-center">{{ $index + 1 }}</span>
                <span class="w-3/12">
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:text-blue-600">
                        {{ $post->title }}
                    </a>
                </span>
                <span class="w-2/12">{{ $post->user->name }}</span>
                <span class="w-3/12">{{ $post->created_at->format('Y-m-d H:i:s') }}</span>
                <span class="w-2/12">{{ $post->comments->count() }}</span>
            </div>
        @empty
            <p class="text-gray-600">아직 게시물이 없습니다.</p>
        @endforelse
    </div>
</div>
@endsection
