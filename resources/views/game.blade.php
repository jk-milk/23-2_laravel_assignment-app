<!DOCTYPE html>
<html>

<head>
  <title>Chess Game</title>

  <link rel="stylesheet" href="{{ asset('chessboardjs-1.0.0/css/chessboard-1.0.0.min.css') }}">
</head>

<body>
  <div id="myBoard" style="width: 400px"></div>
  <label>Status:</label>
  <div id="status"></div>
  <label>FEN:</label>
  <div id="fen"></div>
  <label>PGN:</label>
  <div id="pgn"></div>



  <!-- jQuery and Chessboard.js Script -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
    crossorigin="anonymous"></script>

  <script src="{{ asset('chessboardjs-1.0.0/js/chessboard-1.0.0.js') }}"></script>
  <script src="https://unpkg.com/chess.js"></script>


  @vite('resources/js/myChess.js')

</body>

</html>