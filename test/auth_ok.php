<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
<meta http-equiv="refresh" content="2; URL=index.php">
    <title></title>
  </head>
  <body>

<style media="screen">
html,
body {
padding: 0;
margin: 0;
background-color: black;
overflow: hidden;
}
</style>

<script type="text/javascript">
var MAX = 96*60;
var vines = [];

function setup() {
createCanvas(windowWidth, windowHeight);
createGradient();
vines.push(new Vine(0, 0, 0, 0, 8, MAX));
frameRate(60);
}

function draw() {

image(bg);

translate(width / 2, height / 2);
for (var i = 0; i < vines.length; i++) {
  vines[i].run();
}

for (var i = vines.length - 1; i >= 0; i--) {
  if (vines[i].isDead()) vines.splice(i, 1);
}

}

function Vine(x, y, a, ai, w, l) {

this.x = x;
this.y = y;
this.a = a;
this.ai = ai;
this.w = w;
this.p = [];
this.l = l;

this.run = function() {
  this.update();
  this.render();
  this.create();
  this.isDead();
}

this.update = function() {
  var dx = cos(this.a) * this.w / 1;
  var dy = sin(this.a) * this.w / 1;
  this.x += dx;
  this.y += dy;
  this.a += this.ai / this.w / 2;
  this.p.push([this.x, this.y]);
  this.p.splice(0, this.p.length - this.l);
  this.p.splice(0, this.p.length - 60 * 5);
  this.l -= 1;
  //println(this.p.length);

  if (frameCount % 30 === 0) this.ai = random(-0.5, 0.5);
}

this.render = function() {
  if (this.w === 8) translate(-this.x, -this.y);
  var h = this.a * 60;
  var s = 25;
  var b = 60 + this.w * 5;
  stroke(255,this.w*30);
  noFill();
  var listLen = this.p.length - 1;
  beginShape();
  for (var i = 0; i < listLen; i++) {
    vertex(this.p[i][0], this.p[i][1]);
  }
  endShape();
}

this.create = function() {
  if (this.w > 1 && random(1) < this.l / 16384.0) {
    vines.push(new Vine(this.x, this.y, this.a, this.ai, this.w / 2, min(this.l, this.w * 32 * random(1, 2))));
  }
}

this.isDead = function() {
  if (this.l < 0.0) {
    return true;
  } else {
    return false;
  }
}

}

function createGradient() {
bg = createGraphics(width, height);
var steps = 500;
var to = color('#456'),
  from = color('#100');
for (var i = 0; i < steps; i++) {
  var diam = map(i, 0, steps, width * 1.5, 1);
  var lerpValue = map(i, 0, steps, 0, 1);
  var f = lerpColor(from, to, lerpValue);
  bg.fill(f);
  bg.noStroke();
  bg.ellipse(width / 2, height / 2, diam, diam);
}
}

function windowResized() {
resizeCanvas(windowWidth, windowHeight);
createGradient();
}
</script>




  </body>
</html>
