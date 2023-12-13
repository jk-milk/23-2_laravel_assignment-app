// NOTE: this example uses the chess.js library:
// https://github.com/jhlywa/chess.js

import { Chess } from "chess.js"

var board = null
var game = new Chess()
var $status = $('#status')
var $pgn = $('#pgn')

function onDragStart(source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.isGameOver()) return false

  // only pick up pieces for the side to move
  if ((game.turn() === 'w' && piece.search(/^b/) !== -1) ||
    (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
    return false
  }
}

function onDrop(source, target) {
  // see if the move is legal
  var move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  })

  // illegal move
  if (move === null) return 'snapback'

  updateStatus()
}

// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd() {
  board.position(game.fen())
}

function updateStatus() {
  var status = ''

  var moveColor = '백'
  if (game.turn() === 'b') {
    moveColor = '흑'
  }

  // checkmate?
  if (game.isCheckmate()) {
    let winner = '';
    if (moveColor === '백') {
      winner = '흑';
    } else if (moveColor === '흑') {
      winner = '백';
    }
    status = winner + ' 승리 체크메이트';
    savePgn();
    $("#dialog").html(status).dialog();
  }

  // draw?
  else if (game.isDraw()) {
    status = '무승부'
    savePgn();
    $("#dialog").html(status).dialog();
  }

  // game still on
  else {
    status = moveColor + ' 차례'

    // check?
    if (game.isCheck()) {
      status += ', ' + ' 체크 상태'
    }
  }

  $status.html(status)
  $pgn.html(game.pgn())
}

function savePgn() {
  var pgn = game.pgn();

  $.ajax({
    type: 'POST',
    url: '/save-pgn',
    data: {
      pgn: pgn,
      _token: $('meta[name="csrf-token"]').attr('content') // CSRF 토큰 추가
    },
    success: function (response) {
      if (response.success) {
        console.log('PGN saved successfully!');
      } else {
        console.error('Failed to save PGN.');
      }
    },
    error: function (error) {
      console.error('Error:', error);
    }
  });
}

var config = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onSnapEnd: onSnapEnd
}
board = Chessboard('myBoard', config)

updateStatus()