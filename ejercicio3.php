<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			$num=1;
            $cuadrado=0;
            $final=0;

            while ($num<51) {
                $cuadrado=$num*$num;
                echo "la raiz cuadrada de " . $num . " es igual a: " . $cuadrado . "<br><br>";
                $final=$final+$cuadrado;
                $num=$num+1;
            }
                echo "<br><br>_____________________________________________________________________________________________<br><br>";
                echo "La suma de todos los resultados de las raíces es: ". $final. "<br><br>";
		?>
	</body>
</html>
