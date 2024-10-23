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
                        <h4>Inicio de Sesión</h4>
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
                        <button id="logoutButton" class="btn btn-danger btn-block mt-3" style="display:none;" onclick="logoutUser()">Cerrar Sesión</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Verificar el estado de sesión al cargar la página
        document.addEventListener("DOMContentLoaded", function() {
            if (sessionStorage.getItem('accessKey')) {
                showLogoutButton();
                cerrarformulario();
            }
        });

        function loginUser() {
            var username = document.getElementById('usuario').value;
            var password = document.getElementById('password').value;

            fetch('http://localhost:8081/ProyectoServicios/Proyecto-Servicios/wwwroot/controllers/apiRest.php', {
                method: 'POST',
                body: new URLSearchParams({
                    nombre_user: username,
                    contrasenia_user: password
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la red');
                }
                return response.json();
            })
            .then(result => {
                console.log(result);
                if (result == 'Bienvenido') {
                    sessionStorage.setItem('accessKey', "Logueado");
                    alert('Login exitoso');
                    showLogoutButton(); // Mostrar el botón de cerrar sesión
                    cerrarformulario();

                    
                } else {
                    alert('Error al intentar iniciar sesión');
                }
            })
            .catch(error => {
                console.error('Error al intentar iniciar sesión:', error);
                alert('Error al intentar iniciar sesión');
            });
        }

        function showLogoutButton() {
            document.getElementById('logoutButton').style.display = 'block';
        }
        function cerrarformulario(){
            document.getElementById('loginForm').style.display ='none';
        }

        function mostrarformulario(){
            document.getElementById('loginForm').style.display = 'block';
        }

        function logoutUser() {
            sessionStorage.removeItem('accessKey'); // Eliminar la clave de sesión
            alert('Has cerrado sesión');
            mostrarformulario();
            document.getElementById('logoutButton').style.display = 'none'; // Ocultar el botón de cerrar sesión
            document.getElementById('loginForm').reset(); // Reiniciar el formulario
        }
    </script>
</body>

</html>