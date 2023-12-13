<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('game');
    }

    public function savePgn(Request $request)
    {
        // PGN 데이터를 받음
        $pgn = $request->input('pgn');

        // 인증된 사용자를 가져옴
        $user = Auth::user();

        // 새 게임 인스턴스를 생성하고 데이터를 저장
        $game = new Game;
        $game->user_id = $user->id;
        $game->pgn = $pgn;
        $game->save();

        // 성공적으로 저장되었다면, 성공 응답을 반환
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', ['game' => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
