<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Estudiantes</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
        <h2 class="mb-4 text-center">Tabla de Estudiantes</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Curso ID</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaEstudiantes">
                    <!-- Los datos se cargarán aquí -->
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#agregarModal">Agregar Estudiante</button>
    </div>

    
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAgregarEstudiante">
                        <!-- Campos del formulario -->
                        <div class="form-group">
                            <label for="cedula">Cédula</label>
                            <input type="text" class="form-control" id="cedula" name="estCedula" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="estNombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="estApellido" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="estTelefono" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="estDireccion" required>
                        </div>
                        <div class="form-group">
                            <label for="curso">Curso</label>
                            <select class="form-control" id="curso" name="curId" required>
                                <!-- Opciones del curso cargadas dinámicamente -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregarEstudiante">
                    <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="estCedula" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="estNombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="estApellido" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="estTelefono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="estDireccion" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select class="form-control" id="curso" name="curId" required>
                           
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este estudiante?</p>
                    <input type="hidden" id="cedulaEliminar" name="estCedula">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnConfirmarEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarEstudiante">
                    <div class="form-group">
                        <label for="cedulaEdit">Cédula</label>
                        <input type="text" class="form-control" id="cedulaEdit" name="estCedula" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreEdit">Nombre</label>
                        <input type="text" class="form-control" id="nombreEdit" name="estNombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidoEdit">Apellido</label>
                        <input type="text" class="form-control" id="apellidoEdit" name="estApellido" required>
                    </div>
                    <div class="form-group">
                        <label for="telefonoEdit">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoEdit" name="estTelefono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccionEdit">Dirección</label>
                        <input type="text" class="form-control" id="direccionEdit" name="estDireccion" required>
                    </div>
                    <div class="form-group">
                        <label for="cursoEdit">Curso</label>
                        <select class="form-control" id="cursoEdit" name="curId" required>
                            <!-- Opciones del combo cargadas dinámicamente -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <script>

    function cargarEstudiantes() {
        $.ajax({
            url: 'models/acceder.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    $('#tablaEstudiantes').empty();
                    $.each(data, function(index, estudiante) {
                        var fila = `<tr>
                            <td>${estudiante.estCedula}</td>
                            <td>${estudiante.estNombre}</td>
                            <td>${estudiante.estApellido}</td>
                            <td>${estudiante.estTelefono}</td>
                            <td>${estudiante.estDireccion}</td>
                            <td>${estudiante.curNombre}</td>
                            <td>
                                <button class="btn btn-warning btn-editar" data-cedula="${estudiante.estCedula}" data-nombre="${estudiante.estNombre}" data-apellido="${estudiante.estApellido}" data-telefono="${estudiante.estTelefono}" data-direccion="${estudiante.estDireccion}" data-curid="${estudiante.curId}">Editar</button>
                                <button class="btn btn-danger btn-eliminar" data-cedula="${estudiante.estCedula}">Eliminar</button>
                            </td>
                        </tr>`;
                        $('#tablaEstudiantes').append(fila);
                    });
                }
            }
        });
    }


    $(document).on('click', '.btn-eliminar', function () {
            var cedula = $(this).data('cedula');
            $('#eliminarModal').modal('show');
            $('#cedulaEliminar').val(cedula);
        });

        $('#btnConfirmarEliminar').click(function () {
            var cedula = $('#cedulaEliminar').val();
            console.log(cedula)
            $.ajax({
                url: 'models/borrar.php',
                type: 'POST',
                data: { cedula: cedula },
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        $('#eliminarModal').modal('hide');
                        cargarEstudiantes();
                    } else {
            
                        $('#eliminarModal').modal('hide');
                        cargarEstudiantes();
                    }
                },
                error: function (xhr, status, error) {
                    alert('Error en la solicitud AJAX: ' + error);
                }
            });
        });

    $(document).ready(function() {
        // Cargar estudiantes al cargar la página
        cargarEstudiantes();

        // Cargar cursos en el combo al abrir el modal de agregar estudiante
        $('#agregarModal').on('shown.bs.modal', function() {
            $.ajax({
                url: 'models/cargarCursos.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#curso').empty(); // Limpiamos el combo antes de agregar las opciones
                    $.each(data, function(index, curso) {
                        var option = `<option value="${curso.curId}">${curso.curNombre}</option>`;
                        $('#curso').append(option);
                    });
                }
            });
        });

        // Evento submit del formulario para agregar estudiante
        $('#formAgregarEstudiante').submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize(); 
            console.log(formData)
            $.ajax({
                url: 'models/guardar.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data === "Se guardo") {
                        $('#agregarModal').modal('hide'); // Cerramos el modal
                        cargarEstudiantes(); // Volvemos a cargar la tabla de estudiantes
                    } else {
                        alert('Error al guardar estudiante.');
                    }
                }
            });
        });
    });

    //Editar
    $(document).ready(function() {
        // Evento click para botones de editar
        $(document).on('click', '.btn-editar', function() {
            // Obtener los datos del estudiante seleccionado
            var cedula = $(this).data('cedula');
            var nombre = $(this).data('nombre');
            var apellido = $(this).data('apellido');
            var telefono = $(this).data('telefono');
            var direccion = $(this).data('direccion');
            var curId = $(this).data('curid');

            // Llenar el formulario del modal de edición con los datos obtenidos
            $('#editarModal').find('#cedulaEdit').val(cedula);
            $('#editarModal').find('#nombreEdit').val(nombre);
            $('#editarModal').find('#apellidoEdit').val(apellido);
            $('#editarModal').find('#telefonoEdit').val(telefono);
            $('#editarModal').find('#direccionEdit').val(direccion);

            console.log(curId)
            // Cargar cursos en el combo y seleccionar el curso del estudiante seleccionado
            $.ajax({
                url: 'models/cargarCursos.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#editarModal').find('#cursoEdit').empty(); // Limpiamos el combo antes de agregar las opciones
                    $.each(data, function(index, curso) {
                        var option = `<option value="${curso.curId}" ${curso.curId == curId ? 'selected' : ''}>${curso.curNombre}</option>`;
                        $('#editarModal').find('#cursoEdit').append(option);
                    });
                }
            });

            // Mostrar el modal de edición
            $('#editarModal').modal('show');
        });

        // Evento submit del formulario para editar estudiante
        $('#formEditarEstudiante').submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            console.log(formData)
            $.ajax({
                url: 'models/editar.php',
                type: 'POST',
                data: formData, 
                dataType: 'json',
                success: function(data) {

                        $('#editarModal').modal('hide'); 
                        cargarEstudiantes(); 
                    
                }
            });
        });
    });
</script>

</body>

</html>
