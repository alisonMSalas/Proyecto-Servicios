<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center" style="height: 100vh;">
            <div class="col-md-4 my-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <form id="loginForm" onsubmit="event.preventDefault(); loginUser();">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" id="usuario" class="form-control" placeholder="Ingrese su usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        function loginUser() {
            var username = document.getElementById('usuario').value;
            var password = document.getElementById('password').value;

            $.ajax({
                url: 'http://localhost:8081/ProyectoServicios/Proyecto-Servicios/wwwroot/controllers/apiRest.php',
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function (response) {
                    var result = JSON.parse(response);

                    if (result.accessKey) {
                        sessionStorage.setItem('accessKey', "Logueado");
                        alert('Login exitoso');
                        // Redirigir a otra página o realizar otra acción
                    } else {
                        alert(result.error);
                    }
                },
                error: function (xhr, status, error) {
                    alert('Error al intentar iniciar sesión');
                }
            });
        }
    </script>
</body>

</html>
