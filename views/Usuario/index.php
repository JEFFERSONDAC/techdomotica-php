<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../res/css/style.css">
    <link rel="stylesheet" href="../res/css/bootstrap-grid.min.css">
    <title>Tech Domótica - Iniciar sesión</title>
</head>
<body>
    <?php require_once "../views/components/navbar.php"; ?>
    <div style = "margin-top: 70px;" class="container">
    <div style = "text-align: center;"><img id = "imgLol" src = "../res/img/L4.png" height = "240px" width = "240px" class = "img-fluid" /></div>
        <form id = "form" method = "POST">
            <h3 style = "text-align: center;">Iniciar sesión en Tech Domótica</h3>
            <div class="input-field">
                <label for="field1">Nombre de usuario: </label><input type="text" id = "field1" name = "field1" required />
            </div>
            <div class="input-field">
                <label for="field2">Contraseña: </label><input type="password" id = "field2" name = "field2" required />
            </div>
        </form>
        <div class="input-field"><button onclick = "sendMeme();" id = "login" class = "link">Iniciar sesión</button></div>
    </div>
</body>
<style>
    .animate {
        animation-name: "animate";
        animation-delay: 0s;
        animation-duration: 0.7s;
    }

    @keyframes animate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

</style>
<script>
var form = undefined;

window.addEventListener("DOMContentLoaded", function() {
    form = document.getElementById("form");
});

function sendMeme() {
    if(document.getElementById("field1").value.length > 0 && document.getElementById("field2").value.length > 0) {
        document.getElementById("imgLol").classList.add("animate");
        window.setTimeout(function() {
            form.submit();
        }, 1500);
    }
}


</script>
</html>