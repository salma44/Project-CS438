

class Ramen {


    constructor() {
      this.r = 70;
      this.x = width;
      this.y = height - this.r;
    }
  
    move() {
      this.x -= 7;
    }
  
    show() {
      image(ramenImg, this.x, this.y, this.r, this.r);
  
    }
  
    
  }