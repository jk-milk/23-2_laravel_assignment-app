<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);

    $post = new Post;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->user_id = auth()->id();
    $post->save();

    return redirect()->route('posts.index')->with('message', '게시글이 성공적으로 작성되었습니다.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 게시글 ID로 데이터베이스에서 게시글을 검색
        $post = Post::findOrFail($id);

        // 검색된 게시글을 'posts.show' 뷰에 전달
        return view('posts.show', ['post' => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.show', $post)->with('message', '게시글이 성공적으로 수정되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', '게시글이 성공적으로 삭제되었습니다.');
    }
}
