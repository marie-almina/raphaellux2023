import { GAME_STATES } from "./Game.js";
import { CUBE_SIZE } from "./app.js";
import { data } from "./preload.js";

export class Gui{
  constructor(game, cvs) {
    this.game = game;
    this.cvs = cvs;
    this.ctx = cvs.getContext('2d');
    this.framerate = 60;

    // TODO : remove
    //this.game.start(this.ctx);
  }

  resetEmptyRow(){
    this.ctx.fillStyle = 'black';
    this.ctx.fillRect(0, 0, this.cvs.width, this.game.emptyRow*CUBE_SIZE);
  }
  
  drawBackground(){
    this.ctx.fillStyle = 'black';
    this.ctx.fillRect(0, this.game.emptyRow*CUBE_SIZE, this.cvs.width, this.cvs.height);
    // Draw grid
    this.ctx.strokeStyle = 'white';
    this.ctx.lineWidth = 0.25;
    // Vertical lines
    for(let i = 0; i < this.game.boardWidth+1; i++){
      this.ctx.beginPath();
      this.ctx.moveTo(150+i * CUBE_SIZE, this.game.emptyRow*CUBE_SIZE);
      this.ctx.lineTo(150+i * CUBE_SIZE, this.cvs.height);
      this.ctx.stroke();
    }
    // Horizontal lines
    for(let i = 0 + this.game.emptyRow; i < this.game.boardHeight; i++){
      this.ctx.beginPath();
      this.ctx.moveTo(150, i * CUBE_SIZE);
      this.ctx.lineTo(150+this.game.boardWidth*CUBE_SIZE, i * CUBE_SIZE);
      this.ctx.stroke();
    }
  }

  getColorFromValue(value){
    switch(value){
      case 1:
        return 'red';
      case 2:
        return 'orange';
      case 3:
        return 'yellow';
      case 4:
        return 'green';
      case 5:
        return 'blue';
      case 6:
        return 'purple';
      case 7:
        return 'cyan';
      case 8:
        return 'pink';
      default:
        return 'white';
    }
  }

  drawHeldTetromino(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 25px Arial';
    this.ctx.fillRect(0, CUBE_SIZE*this.game.emptyRow, 150, 30);
    this.ctx.fillStyle = 'black';
    this.ctx.fillText('Hold', 4, CUBE_SIZE*this.game.emptyRow + 23);
    if(this.game.heldTetromino !== null){
      this.ctx.fillStyle = this.getColorFromValue(this.game.heldTetromino.color);
      this.game.heldTetromino.render(
        this.ctx,
        40,
        150,
        20);
    }
    // Draw lines on left
    this.ctx.strokeStyle = 'white';
    this.ctx.lineWidth = 1;
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow);
    this.ctx.lineTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5);
    this.ctx.stroke();

    // Draw line on right
    this.ctx.beginPath();
    this.ctx.moveTo(150, CUBE_SIZE*this.game.emptyRow);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5);
    this.ctx.stroke();

    // Draw line on bottom
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5);
    this.ctx.stroke();
  }
  
  drawNextTetrominos(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 25px Arial';
    this.ctx.fillRect(this.cvs.width - 150, CUBE_SIZE*this.game.emptyRow, 150, 30);
    this.ctx.fillStyle = 'black';
    this.ctx.fillText('Next', this.cvs.width - 146, CUBE_SIZE*this.game.emptyRow + 23);
    for(let i = 0; i < 5; i++){
      this.ctx.fillStyle = this.getColorFromValue(this.game.nextTetrominos[i].color);
      this.game.nextTetrominos[i].render(
        this.ctx,
        this.cvs.width - 110,
        150 + i*80,
        20);
    }
    // Draw lines on left
    this.ctx.strokeStyle = 'white';
    this.ctx.lineWidth = 1;
    this.ctx.beginPath();
    this.ctx.moveTo(this.cvs.width - 150, CUBE_SIZE*this.game.emptyRow);
    this.ctx.lineTo(this.cvs.width - 150, CUBE_SIZE*4*5);
    this.ctx.stroke();

    // Draw line on right
    this.ctx.beginPath();
    this.ctx.moveTo(this.cvs.width, CUBE_SIZE*this.game.emptyRow);
    this.ctx.lineTo(this.cvs.width, CUBE_SIZE*4*5);
    this.ctx.stroke();

    // Draw line on bottom
    this.ctx.beginPath();
    this.ctx.moveTo(this.cvs.width - 150, CUBE_SIZE*4*5);
    this.ctx.lineTo(this.cvs.width, CUBE_SIZE*4*5);
    this.ctx.stroke();
  }

  drawScore(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 25px Arial';
    this.ctx.fillRect(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5, 150, 30);
    this.ctx.fillStyle = 'black';
    this.ctx.fillText('Score', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23);
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 20px Arial';
    this.ctx.fillText(this.game.score, 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25);
    // Draw lines on left
    this.ctx.strokeStyle = 'white';
    this.ctx.lineWidth = 1;
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5);
    this.ctx.lineTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50);
    this.ctx.stroke();

    // Draw line on right
    this.ctx.beginPath();
    this.ctx.moveTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50);
    this.ctx.stroke();

    // Draw line on bottom
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50);
    this.ctx.stroke();
  }

  drawLineCompleted(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 25px Arial';
    this.ctx.fillRect(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5+50, 150, 30);
    this.ctx.fillStyle = 'black';
    this.ctx.fillText('Lines', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 50);
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 20px Arial';
    this.ctx.fillText(this.game.linesCompleted+" / "+this.game.maxLines, 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50);
    // Draw lines on left
    this.ctx.strokeStyle = 'white';
    this.ctx.lineWidth = 1;
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50);
    this.ctx.lineTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50);
    this.ctx.stroke();

    // Draw line on right
    this.ctx.beginPath();
    this.ctx.moveTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50);
    this.ctx.stroke();

    // Draw line on bottom
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50);
    this.ctx.stroke();
  }

  drawWin(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 35px Arial';
    this.ctx.fillText('Félicitation !', this.cvs.width/2 - 125, this.cvs.height/2);
    this.ctx.fillText('Vous avez perdu votre temps !', this.cvs.width/2 - 250, this.cvs.height/2 + 30);
  }

  drawGameOver(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 35px Arial';
    this.ctx.fillText('Game over !', this.cvs.width/2 - 50, this.cvs.height/2);
  }

  drawControls(){
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 25px Arial';
    this.ctx.fillRect(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5+50+50, 150, 30);
    this.ctx.fillStyle = 'black';
    this.ctx.fillText('Controls', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 50 + 50);
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 20px Arial';
    this.ctx.fillText('Left: Q, ←', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50);
    this.ctx.fillText('Right: D, →', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25);
    this.ctx.fillText('Down: S, ↓', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25);
    this.ctx.fillText('Drop: Space', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25);
    this.ctx.fillText('Rotate: Z, W, ↑', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25 + 25);
    this.ctx.fillText('Hold: C', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25 + 25 + 25);
    this.ctx.fillText('Restart: R', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25 + 25 + 25 + 25);
    this.ctx.fillText('Music :', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25 + 25 + 25 + 25 + 25);
    this.ctx.fillText('  - Pause : P', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25 + 25 + 25 + 25 + 25 + 25);
    this.ctx.fillText('  - Next : M', 4, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 23 + 25 + 50 + 50 + 25 + 25 + 25 + 25 + 25 + 25 + 25 + 25 + 25);
    
    // Draw lines on left
    this.ctx.strokeStyle = 'white';
    this.ctx.lineWidth = 1;
    this.ctx.beginPath();
    this.ctx.moveTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50);
    this.ctx.lineTo(0, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50 + 150);
    this.ctx.stroke();

    // Draw line on right
    this.ctx.beginPath();
    this.ctx.moveTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50);
    this.ctx.lineTo(150, CUBE_SIZE*this.game.emptyRow + CUBE_SIZE*5 + 50 + 50 + 150);
    this.ctx.stroke();
  }

  displayStartScreen(){
    this.ctx.fillStyle = 'black';
    this.ctx.fillRect(0, 0, this.cvs.width, this.cvs.height);
    this.ctx.fillStyle = 'white';
    this.ctx.font = 'bold 35px Arial';
    this.ctx.fillText('Press Space to Start', this.cvs.width/2 - 175, this.cvs.height/2 + 125);
    // Display logo image
    this.ctx.drawImage(data['logo'], 25, this.cvs.height/2 - 100, this.cvs.width-50, 125);

  }

  render(){
    switch (this.game.state) {
      case GAME_STATES.LOADING:
        break;
      case GAME_STATES.WAITING_TO_START:
        // TODO
        this.displayStartScreen();
        break;
      case GAME_STATES.PLAYING:
        this.resetEmptyRow();
        this.drawBackground();
        this.drawNextTetrominos();
        this.drawHeldTetromino();
        this.drawScore();
        this.drawLineCompleted();
        this.drawControls();
        this.game.renderBoard(this.ctx);
        break;
      case GAME_STATES.GAME_OVER:
        this.drawGameOver();
        break;
      case GAME_STATES.WIN:
        this.drawWin();
        break;
    }
  }
}