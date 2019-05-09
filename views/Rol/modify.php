<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/css/bootstrap-grid.min.css">
    <title>CRUD de Roles</title>
</head>
<body>
    <h2>Modificación de un usuario</h2>
    <form method = "POST">
        <?php
            $rol = $roles->fetch_assoc();
        ?>
        <h4 style = "text-align: center;">Modificar un rol</h4>
        <div class = "input-field"><label for = "field1">Tipo de rol:</label><input type = "text" name = "field1" id = "field1" value = "<?php echo $rol["tipo_rol"]; ?>" required/></div>
        <div class = "input-field"><input type = "submit" value = "Modificar usuario" name = "post1" /></div>
    </form>
    <a href = "RolController.php?action=getAll">Volver al inicio</a>
    <?php
        if(isset($_POST["post1"])) {
            $rolx = new Rol();
            $rolx->tipo_rol = $_POST["field1"];

            if($rolx->edit()) {
                echo "<script>alert('¡Inserción correcta!')</script>";
                header("Location: RolController.php?action=getAll");
            }
            else echo "<script>alert('¡Inserción incorrecta!')</script>";
        }
    ?>
</body>
</html>