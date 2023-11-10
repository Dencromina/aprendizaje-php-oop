<!DOCTYPE html>
<html>
<head>
    <title>Ventas Bebidas</title>
    <head>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
        <label for="venta">Ventas del Momento</label>
        <select name="venta" id="venta">
            <option value="1">1-Venta 1</option>
            <option value="2">2-Venta 2</option>
        </select>
        <button type="submit">Aceptar</button>
    </form>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $_SESSION["idventa"] = $_POST['venta'];
        header("Location: ventas.php");
        exit();
    }
    ?>
</body>
</html>