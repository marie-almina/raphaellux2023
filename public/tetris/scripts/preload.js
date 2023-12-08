const data = {
    // Image
    "cube-sprite": "tetris/assets/images/block_transparant.png",
    "logo": "tetris/assets/images/tetrux.png",

    // Songs
    "tetris-song-classic": "tetris/assets/sounds/tetris.mp3",
    "tetris-song-phonk": "tetris/assets/sounds/tetris_phonk.mp3",
    "tetris-song-lover": "tetris/assets/sounds/tetris_loved.mp3",
    "line-clear": "tetris/assets/sounds/line_clear.mp3",
}

async function preload(callback) {
    let loaded = 0;
    const total = Object.keys(data).length;
    for (let i in data) {
        if (data[i].endsWith(".png") || data[i].endsWith(".jpg") || data[i].endsWith(".jpeg")) {
            data[i] = await loadImage(data[i]);
        }
        else {
            data[i] = await loadSound(data[i]);
        }
        loaded++;
        callback(loaded, total);
    }
}

function loadImage(path) {
    return new Promise(function(resolve, reject) {
        let img = new Image();
        img.onload = function() {
            resolve(this);
        }
        img.onerror = function() {
            reject(this);
        }
        img.src = path;
    });
}

function loadSound(path) {
    return new Promise(function(resolve, reject) {
        let audio = new Audio();
        audio.oncanplaythrough = function() {
            resolve(this);
        }
        audio.onerror = function() {
            reject(this);
        }
        audio.src = path;
    });
}

export { preload, data };
