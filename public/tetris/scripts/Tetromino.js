import { CUBE_SIZE } from "./app.js";
import { BOARD_VALUES } from "./Game.js";
import { data } from "./preload.js";

export const TETROMINO_TYPES = {
  I: 'I',
  J: 'J',
  L: 'L',
  O: 'O',
  S: 'S',
  T: 'T',
  Z: 'Z'
}

export function buildTetromino(type, isPreview = false){
  switch(type){
    case TETROMINO_TYPES.I:
      return new TetrominoI(isPreview);
    case TETROMINO_TYPES.J:
      return new TetrominoJ(isPreview);
    case TETROMINO_TYPES.L:
      return new TetrominoL(isPreview);
    case TETROMINO_TYPES.O:
      return new TetrominoO(isPreview);
    case TETROMINO_TYPES.S:
      return new TetrominoS(isPreview);
    case TETROMINO_TYPES.T:
      return new TetrominoT(isPreview);
    case TETROMINO_TYPES.Z:
      return new TetrominoZ(isPreview);
    default:
      throw new Error(`Unknown tetromino type: ${type}`)
  }

}

export class Tetromino {
  constructor(type, x, y,color){
    this.type = type;
    this.x = x;
    this.y = y;
    this.shape = [];
    this.color = color;
    this.locked = false;
    this.test = false;
    this.angle = 0;
  }

  moveLeft(game){
    // Get the more left x of the tetromino
    let minX = this.shape[0].length;
    this.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1 && x < minX){
          minX = x;
        }
      });
    });

    if(this.x + minX <= 0){
      return;
    }

    game.clearTetromino(this);
    this.x--;
    if(!game.tetrominoIsValid(this)){
      this.x++;
    }
    game.placeTetromino(this);
    game.gravityTimeAcumulator = 0;
  }

  moveRight(game){
    // Get the more right x of the tetromino
    let maxX = 0;
    this.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1 && x > maxX){
          maxX = x;
        }
      });
    });
    if(this.x + maxX >= game.boardWidth - 1){
      return;
    }

    game.clearTetromino(this);
    this.x++;
    if(!game.tetrominoIsValid(this)){
      this.x--;
    }
    game.placeTetromino(this);
    game.gravityTimeAcumulator = 0;
  }

  moveDown(game){
    if(!game.tetrominoCanMoveDown(this)){
      this.locked = true;
      game.hasAlreadyHeld = false;
      return;
    }
    game.clearTetromino(this);
    this.y++;
    game.placeTetromino(this);
  }

  rotate(game, clockwise){
    game.gravityTimeAcumulator = 0;
  }

  hardDrop(game){
    while(game.tetrominoCanMoveDown(this)){
      this.moveDown(game);
    }
    this.locked = true;
    game.hasAlreadyHeld = false;
    game.gravityTimeAcumulator = 0;
  }

  render(ctx,posX,posY,size){
    this.shape.forEach((row, y) => {
      row.forEach((value, x) => {
        if(value === 1){
          ctx.fillStyle = this.color;
          ctx.fillRect(posX+x*size, posY+y*size, size, size);
          ctx.drawImage(data['cube-sprite'], posX+x*size, posY+y*size, size, size);
        }
      });
    });
  } 
}

export class TetrominoI extends Tetromino {
  constructor(isPreview){
    super('I', 3,-1,isPreview ? BOARD_VALUES.PREVIEW : BOARD_VALUES.CYAN);
    this.isPreview = isPreview;
    this.shape = [
        [0,0,0,0,0],
        [0,1,1,1,1],
        [0,0,0,0,0],
        [0,0,0,0,0]
    ];
  }
  rotate(game, clockwise){
    super.rotate(game, clockwise);
    game.clearTetromino(this);
    this.angle = clockwise ? (this.angle + 90) % 360 : (this.angle - 90) % 360;
    let oldShape = this.shape;
    switch(this.angle){
      case 0:
        this.shape = [
          [0,0,0,0],
          [1,1,1,1],
          [0,0,0,0],
          [0,0,0,0]
        ];
        break;
      case 90:
      case -270:
        this.shape = [
          [0,0,1,0],
          [0,0,1,0],
          [0,0,1,0],
          [0,0,1,0]
        ];
        break;
      case 180:
      case -180:
        this.shape = [
          [0,0,0,0],
          [0,0,0,0],
          [1,1,1,1],
          [0,0,0,0]
        ];
        break;
      case 270:
      case -90:
        this.shape = [
          [0,1,0,0],
          [0,1,0,0],
          [0,1,0,0],
          [0,1,0,0]
        ];
        break;
    }
    if(!game.tetrominoIsInside(this)){
      this.shape = oldShape;
    }
    if(!game.tetrominoIsValid(this)){
      while(!game.tetrominoIsValid(this)){
        this.y--;
      }
    }
    game.placeTetromino(this);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}

export class TetrominoJ extends Tetromino {
  constructor(isPreview){
    super('J', 3,0,isPreview? BOARD_VALUES.PREVIEW : BOARD_VALUES.BLUE);
    this.shape = [
      [1, 0, 0],
      [1, 1, 1],
      [0, 0, 0]
    ];
  }
  rotate(game, clockwise){
    super.rotate(game, clockwise);
    game.clearTetromino(this);
    this.angle = clockwise ? (this.angle + 90) % 360 : (this.angle - 90) % 360;
    let oldShape = this.shape;
    switch(this.angle){
      case 0:
        this.shape = [
          [1, 0, 0],
          [1, 1, 1],
          [0, 0, 0]
        ];
        break;
      case 90:
      case -270:
        this.shape = [
          [0, 1, 1],
          [0, 1, 0],
          [0, 1, 0]
        ];
        break;
      case 180:
      case -180:
        this.shape = [
          [0, 0, 0],
          [1, 1, 1],
          [0, 0, 1]
        ];
        break;
      case 270:
      case -90:
        this.shape = [
          [0, 1, 0],
          [0, 1, 0],
          [1, 1, 0]
        ];
        break;
    }
    if(!game.tetrominoIsInside(this)){
      this.shape = oldShape;
    }
    if(!game.tetrominoIsValid(this)){
      while(!game.tetrominoIsValid(this)){
        this.y--;
      }
    }
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
    game.placeTetromino(this); 
  }

  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}


export class TetrominoL extends Tetromino {
  constructor(isPreview){
    super('L', 3,0,isPreview? BOARD_VALUES.PREVIEW : BOARD_VALUES.ORANGE);
    this.shape = [
      [0, 0, 1],
      [1, 1, 1],
      [0, 0, 0]
    ];
  }
  rotate(game, clockwise){
    super.rotate(game, clockwise);
    game.clearTetromino(this);
    this.angle = clockwise ? (this.angle + 90) % 360 : (this.angle - 90) % 360;
    let oldShape = this.shape;
    switch(this.angle){
      case 0:
        this.shape = [
          [0, 0, 1],
          [1, 1, 1],
          [0, 0, 0]
        ];
        break;
      case 90:
      case -270:
        this.shape = [
          [0, 1, 0],
          [0, 1, 0],
          [0, 1, 1]
        ];
        break;
      case 180:
      case -180:
        this.shape = [
          [0, 0, 0],
          [1, 1, 1],
          [1, 0, 0]
        ];
        break;
      case 270:
      case -90:
        this.shape = [
          [1, 1, 0],
          [0, 1, 0],
          [0, 1, 0]
        ];
        break;
    }
    if(!game.tetrominoIsInside(this)){
      this.shape = oldShape;
    }
    if(!game.tetrominoIsValid(this)){
      while(!game.tetrominoIsValid(this)){
        this.y--;
      }
    }
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
    game.placeTetromino(this); 
  }

  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}

export class TetrominoS extends Tetromino {
  constructor(isPreview){
    super('S', 3,0,isPreview? BOARD_VALUES.PREVIEW : BOARD_VALUES.GREEN);
    this.shape = [
      [0, 1, 1],
      [1, 1, 0],
      [0, 0, 0]
    ];
  }
  rotate(game, clockwise){
    super.rotate(game, clockwise);
    game.clearTetromino(this);
    this.angle = clockwise ? (this.angle + 90) % 360 : (this.angle - 90) % 360;
    let oldShape = this.shape;
    switch(this.angle){
      case 0:
        this.shape = [
          [0, 1, 1],
          [1, 1, 0],
          [0, 0, 0]
        ];
        break;
      case 90:
      case -270:
        this.shape = [
          [0, 1, 0],
          [0, 1, 1],
          [0, 0, 1]
        ];
        break;
      case 180:
      case -180:
        this.shape = [
          [0, 0, 0],
          [0, 1, 1],
          [1, 1, 0]
        ];
        break;
      case 270:
      case -90:
        this.shape = [
          [1, 0, 0],
          [1, 1, 0],
          [0, 1, 0]
        ];
        break;
    }
    if(!game.tetrominoIsInside(this)){
      this.shape = oldShape;
    }
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
    game.placeTetromino(this); 
  }

  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}

export class TetrominoO extends Tetromino {
  constructor(isPreview){
    super('O', 4,0,isPreview? BOARD_VALUES.PREVIEW : BOARD_VALUES.YELLOW);
    this.shape = [
      [1, 1],
      [1, 1]
    ]
  }
  rotate(){
    super.rotate(game, clockwise);
    // Do nothing (square)
  }
  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}

export class TetrominoT extends Tetromino {
  constructor(isPreview){
    super('T', 3,0,isPreview? BOARD_VALUES.PREVIEW : BOARD_VALUES.PURPLE);
    this.shape = [
        [0,0,0],
        [1,1,1],
        [0,1,0]
    ];
  }
  rotate(game, clockwise){
    super.rotate(game, clockwise);
    game.clearTetromino(this);
    this.angle = clockwise ? (this.angle + 90) % 360 : (this.angle - 90) % 360;
    let oldShape = this.shape;
    switch(this.angle){
      case 0:
        this.shape = [
          [0,1,0],
          [1,1,1],
          [0,0,0]
        ];
        break;
      case 90:
      case -270:
        this.shape = [
          [0,1,0],
          [0,1,1],
          [0,1,0]
        ];
        break;
      case 180:
      case -180:
        this.shape = [
          [0,0,0],
          [1,1,1],
          [0,1,0]
        ];
        break;
      case 270:
      case -90:
        this.shape = [
          [0,1,0],
          [1,1,0],
          [0,1,0]
        ];
        break;
    }
    if(!game.tetrominoIsInside(this)){
      this.shape = oldShape;
    }
    if(!game.tetrominoIsValid(this)){
      while(!game.tetrominoIsValid(this)){
        this.y--;
      }
    }
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
    game.placeTetromino(this); 
  }

  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}

export class TetrominoZ extends Tetromino {
  constructor(isPreview){
    super('Z', 3,0,isPreview ? BOARD_VALUES.PREVIEW : BOARD_VALUES.RED);
    this.shape = [
      [1, 1, 0],
      [0, 1, 1],
      [0, 0, 0]
    ];
  }
  rotate(game, clockwise){
    super.rotate(game, clockwise);
    game.clearTetromino(this);
    this.angle = clockwise ? (this.angle + 90) % 360 : (this.angle - 90) % 360;
    let oldShape = this.shape;
    switch(this.angle){
      case 0:
        this.shape = [
          [1, 1, 0],
          [0, 1, 1],
          [0, 0, 0]
        ];
        break;
      case 90:
      case -270:
        this.shape = [
          [0, 0, 1],
          [0, 1, 1],
          [0, 1, 0]
        ];
        break;
      case 180:
      case -180:
        this.shape = [
          [0, 0, 0],
          [1, 1, 0],
          [0, 1, 1]
        ];
        break;
      case 270:
      case -90:
        this.shape = [
          [0, 1, 0],
          [1, 1, 0],
          [1, 0, 0]
        ];
        break;
    }
    if(!game.tetrominoIsInside(this)){
      this.shape = oldShape;
    }
    if(!game.tetrominoIsValid(this)){
      while(!game.tetrominoIsValid(this)){
        this.y--;
      }
    }
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
    game.placeTetromino(this); 
  }

  destroy(){
    delete this;
  }

  moveDown(game){
    super.moveDown(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveLeft(game){
    super.moveLeft(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }

  moveRight(game){
    super.moveRight(game);
    if(!this.isPreview && !this.locked){
      game.placePreview(this);
    }
  }
}