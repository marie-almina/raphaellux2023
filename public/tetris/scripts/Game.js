import { buildTetromino, Tetromino, TETROMINO_TYPES } from "./Tetromino.js";
import { data } from "./preload.js";
import { CUBE_SIZE } from "./app.js";

export const GAME_STATES = {
  LOADING: 0,
  WAITING_TO_START: 1,
  PLAYING: 2,
  GAME_OVER: 3,
  WIN: 4
}

export const BOARD_VALUES = {
  PREVIEW: -1,
  EMPTY: 0,
  RED: 1,
  ORANGE: 2,
  YELLOW: 3,
  GREEN: 4,
  BLUE: 5,
  PURPLE: 6,
  CYAN: 7,
  PINK: 8
}

export class Game{
  constructor(canvas){
    this.board = [];
    this.score = 0;
    this.lines = 0;
    this.level = 0;
    this.isGameOver = false;
    this.currentTetromino = null;
    this.nextTetrominos = [];
    this.heldTetromino = null;
    this.hasAlreadyHeld = false;
    this.boardWidth = 10;
    this.emptyRow = 3;
    this.boardHeight = 20 + this.emptyRow;
    this.canvas = canvas;
    this.ctx = canvas.getContext('2d');
    this.gravityTimeAcumulator = 0;
    this.loading = { loaded: 0, total: 0 }
    this.state = GAME_STATES.LOADING;
    this.preview = null;
    this.linesCompleted = 0;
    this.maxLines = 404;
  }

  setLoadingProgress(loaded, total) {
    this.loading = { loaded, total };
    if (loaded == total) {
        // TODO : change state
        this.state = GAME_STATES.WAITING_TO_START;
        this.start();
    }
}

  start(){
    this.initBoard();
    this.generateNextTetrominos();
    this.currentTetromino = this.nextTetrominos.shift();
    this.song = data["tetris-song-classic"];
    this.song.loop = true;
    this.song.play();
  }

  initBoard(){
    for(let i = 0; i < this.boardHeight; i++){
      this.board.push(new Array(this.boardWidth).fill(0));
    }
  }

  getColor(value){
    switch (value) {
      case BOARD_VALUES.RED:
        return 'red';
      case BOARD_VALUES.ORANGE:
        return 'orange';
      case BOARD_VALUES.YELLOW:
        return 'yellow';
      case BOARD_VALUES.GREEN:
        return 'green';
      case BOARD_VALUES.BLUE:
        return 'blue';
      case BOARD_VALUES.PURPLE:
        return 'purple';
      case BOARD_VALUES.CYAN:
        return 'cyan';
      case BOARD_VALUES.PINK:
        return 'pink';
      case BOARD_VALUES.PREVIEW:
        // rgba gray
        return 'rgba(125,125,125,0.5)';
      default:
        return 'black';
    }
  }

  renderBoard(ctx){
    // Render board
    this.board.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value !== 0){
          ctx.fillStyle = this.getColor(value);
          ctx.fillRect(150+x * CUBE_SIZE, y * CUBE_SIZE, CUBE_SIZE, CUBE_SIZE);
          ctx.drawImage(data["cube-sprite"], 150+x * CUBE_SIZE, y * CUBE_SIZE, CUBE_SIZE, CUBE_SIZE);
        }
      });
    });
  }

  holdTetromino(){
    if(this.hasAlreadyHeld){
      return;
    }
    // Clear current tetromino from board
    this.clearTetromino(this.currentTetromino);
    let x = this.currentTetromino.x;
    let y = this.currentTetromino.y;
    if(this.heldTetromino === null){
      this.heldTetromino = this.currentTetromino;
      this.currentTetromino = this.nextTetrominos.shift();
      if(this.nextTetrominos.length === 5){
        this.generateNextTetrominos();
      }
    }else{
      let temp = this.currentTetromino;
      this.currentTetromino = this.heldTetromino;
      this.heldTetromino = temp;
    }
    this.currentTetromino.x = x;
    this.currentTetromino.y = y;
  }

  generateNextTetrominos(){
    let tetrominoTypes = Object.values(TETROMINO_TYPES);
    while(tetrominoTypes.length > 0){
      let index = Math.floor(Math.random() * tetrominoTypes.length);
      this.nextTetrominos.push(buildTetromino(tetrominoTypes[index]));
      tetrominoTypes.splice(index, 1);
    }
  }

  printBoard(){
    let lines = 'Board\n';
    this.board.forEach((row, y) => {
      let line = '';
      row.forEach((value, x) => {
        line += value;
      });
      lines += line + '\n';
    });
    console.log(lines);
  }

  placePreview(tetromino){
    // Clear previous preview (remove all -1)
    this.board.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === BOARD_VALUES.PREVIEW){
          this.board[y][x] = BOARD_VALUES.EMPTY;
        }
      });
    });

    this.preview = buildTetromino(tetromino.type, true);
    this.preview.x = tetromino.x;
    this.preview.angle = tetromino.angle;
    this.preview.y = tetromino.y;
    this.preview.shape = tetromino.shape;

    // Place preview at bottom (stop when it collides)
    while(this.tetrominoCanMoveDown(this.preview)){
      //console.log('move down');
      this.preview.y++;
    }
    if(!(this.preview.y === tetromino.y && this.preview.x === tetromino.x)){
      this.placeTetromino(this.preview);
    }
  }

  // Game loop
  update(dt){
    if(this.state !== GAME_STATES.PLAYING){
      return;
    }
    if(this.currentTetromino){
      if(this.detectWin()){
        this.state = GAME_STATES.WIN;
      }
      if(this.detectGameOver()){
        this.state = GAME_STATES.GAME_OVER;
      }
    }
    this.gravityTimeAcumulator += dt; 
    // Change current tetromino if locked
    if(this.currentTetromino && this.currentTetromino.locked){
      this.currentTetromino.destroy();
      // Use the next tetromino
      this.currentTetromino = this.nextTetrominos.shift();
      if(this.nextTetrominos.length === 5){
        this.generateNextTetrominos();
      }
    }
    if(this.gravityTimeAcumulator >= 0.25){
      this.gravityTimeAcumulator = 0;
      // Move current tetromino
      if(this.currentTetromino){
        if(this.tetrominoCanMoveDown(this.currentTetromino)){
          this.currentTetromino.moveDown(this);
        }else{
          this.currentTetromino.locked = true;
          this.hasAlreadyHeld = false;
        }
      }
    }
    // Check for full lines
    let lines = this.detectFullLines();
    if(lines.length > 0){
      data["line-clear"].play();
      this.score += lines.length * 100;
      this.lines += lines.length;
      this.level = Math.floor(this.lines / 10);
      lines.forEach((line) => {
        this.board.splice(line, 1);
        this.board.unshift(new Array(this.boardWidth).fill(0));
      });
      this.linesCompleted += lines.length;
    }
  }

  detectFullLines(){
    let lines = [];
    this.board.forEach((row, y) => {
      let isFull = true;
      row.forEach((value, x) => {
        if(value <= 0){
          isFull = false;
        }
      });
      if(isFull){
        lines.push(y);
      }
    });
    return lines;
  }

  // Check if the given tetromino can move down
  tetrominoCanMoveDown(tetromino){
    for(let y = 0; y < tetromino.shape.length; y++){  
      for(let x = 0; x < tetromino.shape[y].length; x++){
        if(tetromino.shape[y][x] === 1){
          if(tetromino.y + y + 1 >= this.boardHeight){
            return false;
          }else if(this.board[tetromino.y + y + 1][tetromino.x + x] > 0){
            if(!(y < tetromino.shape.length-1 && tetromino.shape[y+1][x] === 1)){
              return false;
            }
          }
        }
      }
    }
    return true;
  }

  // Clear given tetromino from board (set to 0)
  clearTetromino(tetromino){
    tetromino.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1){
          this.board[tetromino.y + y][tetromino.x + x] = 0;
        }
      });
    });
  }

  // Draw given tetromino on board (set to its value) 
  placeTetromino(tetromino){
    tetromino.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1){
          this.board[tetromino.y + y][tetromino.x + x] = tetromino.color;
        }
      });
    });
  }

  // Check if tetromina is in a valid position
  tetrominoIsValid(tetromino){
    let isValid = true;
    tetromino.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1){
          if(tetromino.y + y >= this.boardHeight || tetromino.x + x >= this.boardWidth){
            isValid = false;
          }else if(this.board[tetromino.y + y][tetromino.x + x] > 0){
            isValid = false;
          }
        }
      });
    });
    return isValid;
  }

  // Check if tetromino is inside the board
  tetrominoIsInside(tetromino){
    let isInside = true;
    tetromino.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1){
          if(tetromino.y + y < 0 || tetromino.x + x < 0){
            isInside = false;
          }
        }
      });
    });
    return isInside;
  }

  // Detect win
  detectWin(){
    return this.linesCompleted >= this.maxLines;
  }

  // detect game over
  detectGameOver(){
    // Detect if the current tetromino is in the black zone
    let isGameOver = false;
    this.currentTetromino.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1){
          if(this.currentTetromino.y + y < this.emptyRow && this.currentTetromino.locked){
            isGameOver = true;
          }
        }
      });
    });
    return isGameOver;
  }




  press(key){
    if(this.state == GAME_STATES.WAITING_TO_START){
      if(key === ' ' || key === 'Enter'){
        this.state = GAME_STATES.PLAYING;
        return;
      }
    }
    if (this.state == GAME_STATES.PLAYING) {
      switch (key) {
        case 'ArrowLeft':
        case 'q':
          this.currentTetromino.moveLeft(this);
          break;
        case 'ArrowRight':
        case 'd':
          this.currentTetromino.moveRight(this);
          break;
        case 'ArrowDown':
        case 's':
          // TODO : move down faster
          this.currentTetromino.moveDown(this);
          break;
        case 'ArrowUp':
        case 'z':
          this.currentTetromino.rotate(this,true);
          break;
        case 'w':
          this.currentTetromino.rotate(this,false);
          break;
        case ' ':
          this.currentTetromino.hardDrop(this);
          this.hasAlreadyHeld = false;
          break;
        case 'Shift':
        case 'c':
          this.holdTetromino();
          this.hasAlreadyHeld = true;
          break;
        case 'r':
          window.location.reload();
          break;
        case 'p':
          if(this.song.paused){
            this.song.play();
          }else{
            this.song.pause();
          }
          break;
        case 'm':
          // Change song in cicle
          let songs = Object.values(data).filter((value) => {
            return value.src.endsWith('.mp3');
          });
          let index = songs.indexOf(this.song);
          index++;
          if(index >= songs.length){
            index = 0;
          }
          this.song.pause();
          this.song = songs[index];
          this.song.loop = true;
          this.song.currentTime = 0;
          this.song.play();
          break;
      }
    }
  }
}

// TODO : detect game over