<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>CRUD de Roles</title>
</head>
<body>
    <h2>Bienvenido al CRUD de Roles</h2>
    <table>
        <thead>
            <tr>
                <td>Nombre de rol</td>
                <td>Opciones</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while($uwu = $roles->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$uwu['tipo_rol']}</td>";
                    echo "<td><a href = 'RolController.php?action=erase&id={$uwu['id_rol']}'>Eliminar</a> | <a href = 'RolController.php?action=modify&id={$uwu['id_rol']}'>Modificar</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <form method = "POST">
        <h4 style = "text-align: center;">Agregar un nuevo rol</h4>
        <div class = "input-field"><label for = "field1">Nombre de rol:</label><input type = "text" name = "field1" id = "field1" required/></div>
        <div class = "input-field"><input type = "submit" value = "Insertar un nuevo usuario" name = "post1" /></div>
    </form>
    <?php
        if(isset($_POST["post1"])) {
            $user = new Rol();
            $user->tipo_rol = $_POST["field1"];
            
            if($user->insert()) {
                echo "<script>alert('¡Inserción correcta!')</script>";
            }
            else echo "<script>alert('¡Inserción incorrecta!')</script>";
        }
    ?>
</body>
</html>