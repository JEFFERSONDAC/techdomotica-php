<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/css/bootstrap-grid.min.css">
    <title>CRUD de usuarios</title>
</head>
<body>
    <h2>Modificación de un usuario</h2>
    <form method = "POST">
        <?php
            $usua = $user->fetch_assoc();
        ?>
        <h4 style = "text-align: center;">Modificar un usuario</h4>
        <div class = "input-field"><label for = "field1">Primer nombre:</label><input type = "text" name = "field1" id = "field1" value = "<?php echo $usua["nom1"]; ?>" required/></div>
        <div class = "input-field"><label for = "field2">Segundo nombre:</label><input type = "text" name = "field2" id = "field2" value = "<?php echo $usua["nom2"]; ?>" /></div>
        <div class = "input-field"><label for = "field3">Primer apellido:</label><input type = "text" name = "field3" id = "field3" value = "<?php echo $usua["apellido1"]; ?>" required/></div>
        <div class = "input-field"><label for = "field4">Segundo apellido:</label><input type = "text" name = "field4" id = "field4" value = "<?php echo $usua["apellido2"]; ?>" /></div>
        <div class = "input-field"><label for = "field5">Correo electrónico:</label><input type = "email" name = "field5" id = "field5" value = "<?php echo $usua["correo"]; ?>" required/></div>
        <div class = "input-field"><label for = "field6">Número de cédula:</label><input type = "number" name = "field6" id = "field6" value = "<?php echo $usua["dni"]; ?>" required/></div>
        <div class = "input-field"><label for = "field7">Contraseña:</label><input type = "password" name = "field7" id = "field7" value = "<?php echo $usua["password"]; ?>" required/></div>
        <div class = "input-field">
            <select name = "field8">
            <?php

                while($rol = $roles->fetch_assoc()) {
                    echo "<option value = '{$rol['id_rol']}'>{$rol['tipo_rol']}</option>";
                }
                
            ?>
            </select>
        </div>
        <div class = "input-field"><input type = "submit" value = "Modificar usuario" name = "post1" /></div>
    </form>
    <a href = "UsuarioController.php?action=getAll">Volver al inicio</a>
    <?php
        if(isset($_POST["post1"])) {
            $user = new Usuario();
            $user->nomb1 = $_POST["field1"];
            $user->nomb2 = $_POST["field2"];
            $user->apellido1 = $_POST["field3"];
            $user->apellido2 = $_POST["field4"];
            $user->correo = $_POST["field5"];
            $user->cedula = $_POST["field6"];
            $user->contra = $_POST["field7"];
            $user->id_rol = $_POST["field8"];

            $user->id_usuario = $usua["id_usuario"];

            if($user->edit()) {
                echo "<script>alert('¡Inserción correcta!')</script>";
                header("Location: UsuarioController.php?action=getAll");
            }
            else echo "<script>alert('¡Inserción incorrecta!')</script>";
        }
    ?>
</body>
</html>