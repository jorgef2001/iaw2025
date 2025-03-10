<?php
include 'config.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $auto_id = $_POST['auto_id'];
    $fecha = date("Y-m-d");

    if (!empty($cliente_id) && !empty($auto_id)) {
        $stmt = $conn->prepare("INSERT INTO compras (cliente_id, auto_id, fecha) VALUES (?, ?, ?)");
        $stmt->execute([$cliente_id, $auto_id, $fecha]);
        echo "<div class='alert alert-success'>Compra registrada.</div>";
    }
}

$clientes = $conn->query("SELECT * FROM clientes")->fetchAll();
$autos = $conn->query("SELECT * FROM autos")->fetchAll();
?>

<div class="container">
    <h2>Registrar Compra</h2>
    <form method="post">
        <label>Cliente:</label>
        <select name="cliente_id" class="form-control">
            <?php foreach ($clientes as $c) { echo "<option value='{$c['id']}'>{$c['nombre']}</option>"; } ?>
        </select>
        <label>Auto:</label>
        <select name="auto_id" class="form-control">
            <?php foreach ($autos as $a) { echo "<option value='{$a['id']}'>{$a['marca']} {$a['modelo']}</option>"; } ?>
        </select>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
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
