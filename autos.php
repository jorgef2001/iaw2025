<?php
include 'config.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $matricula = $_POST['matricula'];
    $precio = $_POST['precio'];

    if (!empty($marca) && !empty($modelo)) {
        try {
            $stmt = $conn->prepare("INSERT INTO autos (marca, modelo, matricula, precio) VALUES (?, ?, ?, ?)");
            $stmt->execute([$marca, $modelo, $matricula, $precio]);
            echo "<div class='alert alert-success'>Auto registrado con éxito.</div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>
<div class="container">
    <h2>Registro de Autos</h2>
    <form method="post">
        <div class="mb-3"><label>Marca:</label> <input type="text" name="marca" class="form-control" required></div>
        <div class="mb-3"><label>Modelo:</label> <input type="text" name="modelo" class="form-control" required></div>
        <div class="mb-3"><label>Matricula:</label> <input type="text" name="matricula" class="form-control"></div>
        <div class="mb-3"><label>Precio:</label> <input type="decimal" name="precio" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Registrar Auto</button>
    </form>
</div>

<?php
$limit = 5; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$stmt = $conn->prepare("SELECT * FROM autos LIMIT $limit OFFSET $offset");
$stmt->execute();
$autos = $stmt->fetchAll();
?>

<div class="container">
    <h2>Lista de Autos</h2>
    <table class="table">
        <tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Matrícula</th><th>Precio</th></tr>
        <?php foreach ($autos as $autos) { ?>
            <tr>
                <td><?= $autos['id'] ?></td>
                <td><?= $autos['marca'] ?></td>
                <td><?= $autos['modelo'] ?></td>
                <td><?= $autos['matricula'] ?></td>
                <td><?= $autos['precio'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
