import './bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';
import { Chess } from 'chess.js';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', (event) => {
    var board,
        game = new Chess(window.pgn);

    if (typeof ChessBoard !== 'undefined') {
        board = ChessBoard('myBoard', {
            position: game.fen(),
            draggable: false
        });
    }
});

Alpine.start();
