<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>CRUD de usuarios</title>
</head>
<body>
    <h2>Bienvenido al CRUD de usuarios</h2>
    <table>
        <thead>
            <tr>
                <td>Nombre completo</td>
                <td>Correo electrónico</td>
                <td>Cédula de ciudadanía</td>
                <td>Rol</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while($uwu = $users->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$uwu['nom1']} {$uwu['nom2']} {$uwu['apellido1']} {$uwu['apellido2']}</td>";
                    echo "<td>{$uwu['correo']}</td>";
                    echo "<td>{$uwu['dni']}</td>";
                    echo "<td>{$uwu['tipo_rol']}</td>";
                    echo "<td><a href = 'UsuarioController.php?action=erase&id={$uwu['id_usuario']}'>Eliminar</a> | <a href = 'UsuarioController.php?action=modify&id={$uwu['id_usuario']}'>Modificar</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <form method = "POST">
        <h4 style = "text-align: center;">Agregar un nuevo usuario</h4>
        <div class = "input-field"><label for = "field1">Primer nombre:</label><input type = "text" name = "field1" id = "field1" required/></div>
        <div class = "input-field"><label for = "field2">Segundo nombre:</label><input type = "text" name = "field2" id = "field2" /></div>
        <div class = "input-field"><label for = "field3">Primer apellido:</label><input type = "text" name = "field3" id = "field3" required/></div>
        <div class = "input-field"><label for = "field4">Segundo apellido:</label><input type = "text" name = "field4" id = "field4" /></div>
        <div class = "input-field"><label for = "field5">Correo electrónico:</label><input type = "email" name = "field5" id = "field5" required/></div>
        <div class = "input-field"><label for = "field6">Número de cédula:</label><input type = "number" name = "field6" id = "field6" required/></div>
        <div class = "input-field"><label for = "field7">Contraseña:</label><input type = "password" name = "field7" id = "field7" required/></div>
        <div class = "input-field">
            <select name = "field8">
            <?php

                while($rol = $roles->fetch_assoc()) {
                    echo "<option value = '{$rol['id_rol']}'>{$rol['tipo_rol']}</option>";
                }
                
            ?>
            </select>
        </div>
        <div class = "input-field"><input type = "submit" value = "Insertar un nuevo usuario" name = "post1" /></div>
    </form>
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

            if($user->insert()) {
                echo "<script>alert('¡Inserción correcta!')</script>";
            }
            else echo "<script>alert('¡Inserción incorrecta!')</script>";
        }
    ?>
</body>
</html>