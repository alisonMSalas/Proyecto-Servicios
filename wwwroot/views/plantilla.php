<html>

<head>
    <title>Mi pagina</title>
    <link rel="stylesheet" href="css/estilos.css" />

</head>

<body>
   
    <header>
        <img src="images/banner.png" width="100%" height="25%" />
    </header>
    <nav>
        <ul>
            <li><a href="index.php?action=inicio">Inicio</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=servicios">Servicios</a></li>
            <li><a href="index.php?action=contactanos">Contactanos</a></li>
           
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
</body>

</html>