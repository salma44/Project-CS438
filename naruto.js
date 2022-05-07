class Naruto {
  constructor() {
    this.r = 150;
    this.x = 20;
    this.y = height - this.r;
    this.vy = 0;
    this.gravity = 2;
  }

  jump() {
    if (this.y == height - this.r) {
      this.vy = -35;
    }
  }

  hits(pains) {
    let x1 = this.x + this.r * 0.5;
    let y1 = this.y + this.r * 0.5;
    let x2 = pains.x + pains.r * 0.5;
    let y2 = pains.y + pains.r * 0.5;
    return collideCircleCircle(x1, y1, this.r, x2, y2, pains.r);
  }

  move() {
    this.y += this.vy;
    this.vy += this.gravity;
    this.y = constrain(this.y, 0, height - this.r);
  }

  show() {
    image(narutoImg, this.x, this.y, this.r, this.r);

   
  }

}