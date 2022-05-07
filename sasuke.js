

class Sasuke {


    constructor() {
      this.r = 128;
      this.x = width;
      this.y = height - this.r;
    }
  
    move() {
      this.x -= 9;
    }
  
    show() {
      image(sasukeImg, this.x, this.y, this.r, this.r);
  
    }
  
    
  }