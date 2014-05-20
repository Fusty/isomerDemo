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

	#canvasWrap {
		margin-top:3em;
	}

</style>
</head>
<body>

<div class="row">
	<div id="canvasWrap" class="col-xs-6 col-xs-offset-3 well">
		<canvas id="canvas" width="600" height="600">
			Sorry your computer sucks :(
		</canvas>
	</div>
</div>

</body>
<script>

/**
 * An animated isometric structure
 * by Jordan Scales
 *
 * Generated with Isomer
 * http://jdan.github.com/isomer
 */

/* Create an Isomer instance with our canvas */
var iso = new Isomer(document.getElementById("canvas"));

/* Some convenient renames */
var Point = Isomer.Point;
var Path = Isomer.Path;
var Shape = Isomer.Shape;
var Color = Isomer.Color;

/* Rotation angle for our centerpiece */
var angle = 0;
function scene() {
  /* Draw a spinning octahedron as our centerpiece */
  iso.add(Octahedron(new Point(3, 2, 3.2))
   .rotateZ(new Point(3.5, 2.5, 0), angle)
   , new Color(0, 180, 180));

  angle += 2 * Math.PI / 60;
}

setInterval(scene, 1000 / 30);





</script>
</html>