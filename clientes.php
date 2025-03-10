<?php
include 'config.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    if (!empty($nombre) && !empty($dni)) {
        try {
            $stmt = $conn->prepare("INSERT INTO clientes (nombre, dni, telefono, email) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $dni, $telefono, $email]);
            echo "<div class='alert alert-success'>Cliente registrado con éxito.</div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>
<div class="container">
    <h2>Registro de Clientes</h2>
    <form method="post">
        <div class="mb-3"><label>Nombre:</label> <input type="text" name="nombre" class="form-control" required></div>
        <div class="mb-3"><label>DNI:</label> <input type="text" name="dni" class="form-control" required></div>
        <div class="mb-3"><label>Teléfono:</label> <input type="text" name="telefono" class="form-control"></div>
        <div class="mb-3"><label>Email:</label> <input type="email" name="email" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Registrar Cliente</button>
    </form>
</div>

<?php
$limit = 5; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$stmt = $conn->prepare("SELECT * FROM clientes LIMIT $limit OFFSET $offset");
$stmt->execute();
$clientes = $stmt->fetchAll();
?>

<div class="container">
    <h2>Lista de Clientes</h2>
    <table class="table">
        <tr><th>ID</th><th>Nombre</th><th>DNI</th><th>Teléfono</th><th>Email</th></tr>
        <?php foreach ($clientes as $cliente) { ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nombre'] ?></td>
                <td><?= $cliente['dni'] ?></td>
                <td><?= $cliente['telefono'] ?></td>
                <td><?= $cliente['email'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
