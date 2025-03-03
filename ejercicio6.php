<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
	</head>
	<body>
		<?php
            $año = array("abril", "agosto", "diciembre", "enero", "febrero", "junio", "julio", "marzo", "mayo", "noviembre", "octubre", "septiembre");
            for ($i=0;$i<=11;$i++){
                $mes=$año($i);
                echo $mes . ", ";
            }
            
		?>
	</body>
</html>