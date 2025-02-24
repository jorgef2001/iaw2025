<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			$nombre = "Jorge";
			$edad = 23;
			$altura = 1.73;
			echo "¡Hola, soy " .$nombre .", tengo ". $edad . " y mido ". $altura . "!<br>";
			print("Hola mundo, desde IES Poligono Sur<br>");
			$x=TRUE;
			$y=FALSE;
			$z=($y OR $x);
			echo $z ? "true" : "false";

			$a=1234;
			$b=-123;
			$c=0123;
			$d=1_234.567;

			if($z=true) {
				echo "<br>ES UN VALOR TRUE";
			} else {
				echo "<br>ES UN VALOR FALSE";
			}
		?>
	</body>
</html>
