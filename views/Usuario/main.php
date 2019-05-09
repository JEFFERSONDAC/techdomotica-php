<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/css/bootstrap-grid.min.css">
    <title>Tech Domótica - Menú principal</title>
</head>
<body>
    <?php require_once "../views/components/navbar.php"; ?>
    <h2>Bienvenido al CRUD de usuarios</h2>
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-lg-6">
                <table class = "table-responsive">
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
                                echo "<td><a class = 'warning' href = 'UsuarioController.php?action=erase&id={$uwu['id_usuario']}'>Eliminar</a><a class = 'link' href = 'UsuarioController.php?action=modify&id={$uwu['id_usuario']}'>Modificar</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class = "col-lg-6">
                <form method = "POST" action = "UsuarioController.php?action=insertUser">
                    <h4 style = "text-align: center;">Agregar un nuevo usuario</h4>
                    <div class="form-group">
                    <div class = "input-field"><label for = "field1">Primer nombre:</label><input type = "text" name = "field1" id = "field1" required/></div>
                    </div>
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
                    <div class = "input-field"><input class = "success" type = "submit" value = "Insertar un nuevo usuario" name = "post1" /></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>