<!DOCTYPE html>
<html>
<head>
	<title>IsomerJS Test</title>

	<link async rel="StyleSheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css" />
    <script type="text/javascript">
        document.write("	\<script src='//code.jquery.com/jquery-latest.min.js' type='text/javascript'>\<\/script>");
    </script>
    <script src='../js/isomer.js' type='text/javascript'></script>


<style>
	body {
		background-color:#aaaaaa;
	}


</style>
</head>
<body>

<div class="row" style="margin-top:.5em;">
	<div class="col-xs-6 col-xs-offset-3 well" style="text-align:center;">
		Thanks for building <a href="http://jdan.github.io/isomer/" type="button" class="btn btn-warning" style="color:black;font-weight:bold;">Isomer</a> jdan, you rock!
	</div>
</div>
<div class="row well" style="margin-top:.5em;">
	<div class="col-xs-3">
		<button type="button" class="btn btn-success btn-block " disabled="disabled">Rotation Controls</button><br/>

		<label for="zrot">Z Rot Speed</label><input name="zrot" id="zrot" type="number" value="1"/><br/><br/>
	</div>
	<div class="col-xs-3">
		<button type="button" class="btn btn-warning btn-block " disabled="disabled">Position Controls</button><br/>

		<label for="xpos">X Position&nbsp&nbsp</label><input name="xpos" id="xpos" type="number" value="2"/><br/>
		<label for="ypos">Y Position&nbsp&nbsp</label><input name="ypos" id="ypos" type="number" value="1"/><br/>
		<label for="zpos">Z Position&nbsp&nbsp</label><input name="zpos" id="zpos" type="number" value="3"/>
	</div>
	<div class="col-xs-3">
		<button type="button" class="btn btn-danger btn-block " disabled="disabled">Cuboid Size</button><br/>

		<label for="xsize">X Size&nbsp&nbsp</label><input name="xsize" id="xsize" type="number" value="2"/><br/>
		<label for="ysize">Y Size&nbsp&nbsp</label><input name="ysize" id="ysize" type="number" value="1"/><br/>
		<label for="zsize">Z Size&nbsp&nbsp</label><input name="zsize" id="zsize" type="number" value="3"/>
	</div>
	<div class="col-xs-3">
		<button type="button" class="btn btn-primary btn-block " disabled="disabled">Color</button><br/>

		<label for="red">Red Channel&nbsp&nbsp</label><input name="red" id="red" type="number" value="200"/><br/>
		<label for="green">Green Channel&nbsp&nbsp</label><input name="green" id="green" type="number" value="100"/><br/>
		<label for="blue">Blue Channel&nbsp&nbsp</label><input name="blue" id="blue" type="number" value="100"/>
	</div>
</div>
<div class="row" style="margin-top:.5em";>
	<div id="canvasWrap" class="well" style="margin:0 auto;width:530px;height:530px;">
		<canvas id="canvas" height="500" width="500">
			Sorry your computer sucks :(
		</canvas>
	</div>
</div>

</body>
<script>

$(document).ready(function(){
	initIsomer();
});


function reSize(){
	var w = $('#canvasWrap').width();

	$('#canvas').width(w*.90);
	initIsomer();
}

function initIsomer(){
	iso = new Isomer(document.getElementById("canvas"), {
		scale: 20,
	});

	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');

	Shape = Isomer.Shape;
	Color = Isomer.Color;
	Point = Isomer.Point;
	Path = Isomer.Path;
}

var angle = 0

function draw(){
	ctx.clearRect(0,0,canvas.width,canvas.height);

	var zrot = parseInt($('#zrot').val());

	var xpos = parseInt($('#xpos').val());
	var ypos = parseInt($('#ypos').val());
	var zpos = parseInt($('#zpos').val());

	var xsize = parseInt($('#xsize').val());
	var ysize = parseInt($('#ysize').val());
	var zsize = parseInt($('#zsize').val());

	var red = parseInt($('#red').val());
	var green = parseInt($('#green').val());
	var blue = parseInt($('#blue').val());

	var color = new Color(red,green,blue);

	angle += zrot*(2*Math.PI/270);

	var cuboid1 = Shape.Prism(new Point(0,0,0),xsize,ysize,zsize);

	iso.add(cuboid1.rotateZ(new Point(xsize/2,ysize/2,zsize/2), angle).translate(xpos,ypos,zpos), color);

}

setInterval(draw, 1000 / 30);





</script>
</html>