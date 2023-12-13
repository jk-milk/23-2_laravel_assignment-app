@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-8">
    <h1 class="text-3xl mt-4 mb-6">{{ $user->name }}의 게임</h1>

    @if($games->isEmpty())
    <p>게임이 없습니다.</p>
    @else
    <table class="w-full">
        <thead>
            <tr>
                <th class="border-b border-gray-200">#</th>
                <th class="border-b border-gray-200">PGN</th>
                <th class="border-b border-gray-200">Date</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($games as $game)
            <tr class="hover:bg-gray-200">
                <td class="py-2 border-b border-gray-200 text-center">
                    <a href="{{ route('game.show', $game) }}" class="block">{{ $game->id }}</a>
                </td>
                <td class="py-2 border-b border-gray-200">
                    <a href="{{ route('game.show', $game) }}" class="block">{{ $game->pgn }}</a>
                </td>
                <td class="py-2 border-b border-gray-200 text-center">
                    <a href="{{ route('game.show', $game) }}" class="block">{{ $game->created_at }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        

    </table>
    @endif
</div>
@endsection