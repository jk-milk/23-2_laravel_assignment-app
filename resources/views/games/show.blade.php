@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-8">
    <h1 class="text-3xl mb-6">게임 상세 정보</h1>
    <div id="myBoard" style="width: 400px"></div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('chessboardjs-1.0.0/js/chessboard-1.0.0.js') }}"></script>
<script>
window.pgn = "{{ $game->pgn }}";
</script>
@endsection
