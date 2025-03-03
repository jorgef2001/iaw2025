<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
	</head>
	<body>
		<?php
            $num=5;
            $sumafinal=0;

		for ($i=1;$i<=100;$i++){
			echo $num . " x " . $i . " = " . $i * $num;
			echo "<br/>";
            $sumafinal=$sumafinal+$num;
		}
		$cuadradofinal=$sumafinal*$sumafinal;
		echo "<br><br>La suma final de todos los números es: " . $sumafinal . "<br><br>";
		echo "El cuadrado de la suma final es: " . $cuadradofinal . "<br><br>";
		?>
	</body>
</html>