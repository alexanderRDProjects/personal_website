<html>
<head><title>Pendulum</title></head>
<body>
<canvas id = "pend" width = 400 height= 400 style="border:1px solid #000000;">
</canvas>
<script>
var x = 300;
var y = 523;
var canvas = document.getElementById("pend");
var ctx = canvas.getContext("2d");
ctx.beginPath();
ctx.arc(x,y,18,0,2*Math.PI);
ctx.fill();
ctx.stroke();
//ctx.fillStyle = "#00F00";

let currentParams = {x:100+100/(2^0.5),y:100+100/(2^0.5)};
function step(ctx,theta,v){
	//resolving forces
	fx = Math.cos((200-x)/(y-
	fy = -4*9.81
	ctx.clearRect(0, 0, canvas.width, canvas.height); 
	ctx.beginPath();
	ctx.moveto(200,100);
	ctx.lineTo(200+150*Math.sin(theta),100+150*Math.cos(theta));
	ctx.stroke();
	ctx.beginPath();
	ctx.arc(200+150*Math.sin(theta),100+150*Math.cos(theta),18,0,2*Math.PI);
	ctx.fill();
	ctx.stroke();
	console.log(theta,v);
	return {theta,v};
}
setInterval(() => {
  currentParams= step(ctx,currentParams.theta , currentParams.v);
}, 1);
	
</script>
</body>
</html>