import {Game} from "./Game.js";
import {Gui} from "./Gui.js";
import {preload, data} from "./preload.js";

export const CUBE_SIZE = 30;

document.addEventListener('DOMContentLoaded', function() {
  const canvas = document.getElementById('cvs');
  const game = new Game(canvas);
  const gui = new Gui(game, canvas);
  canvas.width = game.boardWidth * CUBE_SIZE + 150 + 150;
  canvas.height = game.boardHeight * CUBE_SIZE;

  const loader = new Promise(function(resolve, reject) {
    preload((loaded, total) => { game.setLoadingProgress(loaded, total); });
});

  document.addEventListener('keydown', function(e){
    game.press(e.key);
  });

  let lastUpdate = Date.now();

  function gameLoop(){
    const now = Date.now();
    const dt = (now - lastUpdate) / 1000;
    game.update(dt);
    gui.render();
    lastUpdate = now;

    requestAnimationFrame(gameLoop);
  }

  gameLoop();
});