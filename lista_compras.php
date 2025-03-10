<?php
$stmt = $conn->query("SELECT compras.id, clientes.nombre, autos.marca, autos.modelo, compras.fecha 
                      FROM compras 
                      JOIN clientes ON compras.cliente_id = clientes.id
                      JOIN autos ON compras.auto_id = autos.id");
$compras = $stmt->fetchAll();
?>

<div class="container">
    <h2>Lista de Compras</h2>
    <table class="table">
        <tr><th>ID</th><th>Cliente</th><th>Auto</th><th>Fecha</th></tr>
        <?php foreach ($compras as $compra) { ?>
            <tr>
                <td><?= $compra['id'] ?></td>
                <td><?= $compra['nombre'] ?></td>
                <td><?= $compra['marca'] . " " . $compra['modelo'] ?></td>
                <td><?= $compra['fecha'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
