


let naruto;
let narutoImg;
let painImg;
let konohaImg;
let sasukeImg;
let ramenImg;
let villains = [];
let points=10;
let powerup=1;
let score=0;



function preload() {
  const options = {
    probabilityThreshold: 0.98
  };

  
  narutoImg = loadImage('naruto3.png');
  painImg = loadImage('pain2.png');
  konohaImg = loadImage('konoha.png');
  sasukeImg= loadImage('sasuke.png');
  ramenImg= loadImage('ramen.png');
}

function mousePressed() {
  villains.push(new Pain());
  villains.push(new Sasuke());
  villains.push(new Ramen());
}

function setup() {
  createCanvas(1024, 487);
  naruto = new Naruto();
}

function gotCommand(error, results) {
 
  if (error) {
    console.error(error);
  }
  console.log(results[0].label, results[0].confidence);
  if (results[0].label == 'up') {
    naruto.jump();
  }
}

function keyPressed() {
  if (keyCode === 38) {
    naruto.jump();
     
  }
}

function draw() {

  if (random(1) < 0.005) {
    villains.push(new Pain());
    villains.push(new Sasuke());
    villains.push(new Ramen());
  }

  background(konohaImg);
  fill('orange')
  textSize(40);
  textStyle(BOLD);
  text("Points:"+points, 800, 80);
  text("Score:"+score, 800, 130);


  for (let v of villains) {
    
    v.move();
    v.show();

    if (naruto.hits(v)) {

    if(v instanceof Sasuke){
      points=points+1;
      score=score+5;
      fill('blue')
      textSize(60) 
      textAlign(CENTER , CENTER);
      textStyle(BOLD);
      text(("Thanks Sasuke!"), 490, 100);

    }

    else if (v instanceof Pain ){
      points=points-2;
   }


   else if (v instanceof Ramen ){
    score=score+1;
 }



  }

    if(points < -1){

    textSize(80) 
    textAlign(CENTER , CENTER);
    fill('red')
    text(("Game Over :("), 520, 220);
    document.getElementById("scores").value=score;
    noLoop();

      }

       if(points > 50){
         if (powerup==1){
        narutoImg = loadImage('naruto2.png');
        sasukeImg= loadImage('sasuke2.png');
        powerup=0; 
      }
    }

  }

  naruto.show();
  naruto.move();
}

