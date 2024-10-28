<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Estudiantes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css" />
</head>

<body>
    <header>
        <img src="images/banner.png" width="100%" height="25%" />
    </header>
    <nav>
        <ul>
            <li><a href="index.php?action=inicio">Iniciar Sesión</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=servicios">Servicios</a></li>
            <li><a href="index.php?action=contactanos">Contactanos</a></li>
            <!-- Botón de cerrar sesión -->
            <li id="logoutNavButton" class="nav-item" style="display: none;">
                <button class="btn btn-danger  btn-sm ml-1" onclick="logoutUser()">Cerrar Sesión</button>
            </li>
        </ul>
    </nav>
    <section>
        <?php
        require_once "controllers/controller.php";
        require_once "models/modelo.php";
        $mvc = new MvcController();
        $mvc->enlacesPaginasController();
        ?>
    </section>
    <footer>Derechos Reservados &copy;Cuarto Software</footer>

    <script>
        // Mostrar el botón de cerrar sesión en el navbar si hay sesión iniciada
        document.addEventListener("DOMContentLoaded", function () {
            if (sessionStorage.getItem('accessKey')) {
                document.getElementById('logoutNavButton').style.display = 'inline';
            }
        });

        function logoutUser() {
            sessionStorage.removeItem('accessKey');
            alert('Has cerrado sesión');
            document.getElementById('logoutNavButton').style.display = 'none';
            window.location.href = 'index.php?action=inicio';
        }
    </script>
</body>

</html>