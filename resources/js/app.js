import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

import {Chess} from 'chess.js';

document.addEventListener('DOMContentLoaded', (event) => {
    var board,
        game = new Chess();

    //check the chessboard global object
    if (typeof ChessBoard !== 'undefined') {
        board = ChessBoard('myBoard', 'start');
    }
});

window.Alpine = Alpine;

Alpine.start();
