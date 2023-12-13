<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="{{ asset('chessboardjs-1.0.0/css/chessboard-1.0.0.min.css') }}">

  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 0 16px;
      position: relative;
    }

    #status {
      font-size: 2em;
    }

    #myBoard {
      width: 650px;
    }

    .board-status-container {
      display: flex;
      justify-content: flex-start;
      align-items: flex-start;
    }

    .status-pgn-container {
      margin-left: 20px;
    }

    #statusContainer {
      margin-bottom: 300px;
    }

    a {
      position: absolute;
      top: 16px;
      right: 16px;
      background-color: #4299e1;
      color: white;
      padding: 8px 16px;
      border-radius: 4px;
      text-decoration: none;
    }

    a:hover {
      background-color: #2b6cb0;
    }
  </style>
</head>

<body>
  <a href="{{ route('welcome') }}">홈으로 돌아가기</a>

  <div class="board-status-container">
    <div id="myBoard"></div>
    <div class="status-pgn-container">
      <div id="statusContainer">
        <div id="status"></div>
      </div>
      <label>포지션</label>
      <div id="pgn"></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script src="{{ asset('chessboardjs-1.0.0/js/chessboard-1.0.0.js') }}"></script>
  <script src="https://unpkg.com/chess.js"></script>

  @vite('resources/js/myChess.js')

  <div id="dialog" title="Game Status"></div>

</body>

</html>
