

class Pain {


  constructor() {
    this.r = 130;
    this.x = width;
    this.y = height - this.r;
  }

  move() {
    this.x -= 11;
  }

  show() {
    image(painImg, this.x, this.y, this.r, this.r);

  }

  
}