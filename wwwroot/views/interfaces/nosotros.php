<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>


        function checkAccess() {
            const accessKey = sessionStorage.getItem('accessKey');

            if (!accessKey) {
                $('#btnAgregarEstudiante').hide();
                $('.acciones-col').hide();

            } else {
                $('#btnAgregarEstudiante').show(); // Mostrar el botón de agregar estudiante
                $('.acciones-col').show();
            }
        }
        $(document).ready(function () {
            checkAccess();
            let estudianteCedula = ''; // Variable global para almacenar la cédula del estudiante a eliminar
            let estudianteInfo = {}; // Variable para almacenar la información del estudiante a editar
            const url = "http://localhost:8081/ProyectoServicios/Proyecto-Servicios/wwwroot/controllers/apiRest.php";
            cargarTablaEstudiantes();

            async function cargarCursos(edicion) {
                let response = await fetch(url + '?cursos');
                let data = await response.json();
                console.log(data);
                $('#curso').empty();
                $('#cursoEdit').empty();// Limpiamos el combo antes de agregar las opciones
                if (edicion) {
                    console.log(estudianteInfo.curId);

                    //BLOQUE EN CASO DE QUE SEA PARA EDICION
                    $.each(data, function (index, curso) {
                        var option = `<option value="${curso.curId}" ${curso.curId == estudianteInfo.curId ? 'selected' : ''}>${curso.curNombre}</option>`;
                        $('#editEmployeeModal').find('#cursoEdit').append(option);
                    });
                } else {
                    //CARGAR CURSOS CUANDO SE VA A CREAR UN NUEVO ESTUDIANTE
                    $.each(data, function (index, curso) {
                        var option = `<option value="${curso.curId}">${curso.curNombre}</option>`;
                        $('#curso').append(option);
                    });
                }
            }

            // Cargar cursos en el combo al abrir el modal de agregar estudiante
            $('#addEmployeeModal').on('shown.bs.modal', function () {
                cargarCursos(false);
            });

            // Función para cargar la tabla de estudiantes
            async function cargarTablaEstudiantes() {
                try {
                    let response = await fetch(url);
                    let data = await response.json();
                    console.log(data);
                    $('#employeeTable tbody').empty();
                    $.each(data, function (index, row) {
                        var tr = '<tr>' +
                            '<td>' + row.estCedula + '</td>' +
                            '<td>' + row.estNombre + '</td>' +
                            '<td>' + row.estApellido + '</td>' +
                            '<td>' + row.estDireccion + '</td>' +
                            '<td>' + row.estTelefono + '</td>' +
                            '<td>' + row.curNombre + '</td>' +
                            '<td class="acciones-col">' +
                            '<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="' + row.estCedula + '" data-nombre="' + row.estNombre + '" data-apellido="' + row.estApellido + '" data-direccion="' + row.estDireccion + '" data-telefono="' + row.estTelefono + '" data-curid="' + row.curId + '"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>' +
                            '<a href="#deleteEmployeeModal" class="delete-estudiante" data-id="' + row.estCedula + '" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>' +
                            '</td>' +
                            '</tr>';
                        $('#employeeTable tbody').append(tr);
                    });

                    establecerEventos();
                    checkAccess();
                } catch (error) {
                    console.log("Error al leer el json", error);

                }
            }
            //GUARDAR ESTUDIANTES
            $('#addEmployeeForm').submit(async function (e) {
                e.preventDefault();

                const form = document.getElementById('addEmployeeForm');
                const formData = new FormData(form);
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData,
                    });

                    if (response.ok) {
                        const jsonResponse = await response.json();
                        console.log(jsonResponse);

                        // Cerrar el modal
                        $('#addEmployeeModal').modal('hide');

                        // Recargar la tabla de estudiantes
                        cargarTablaEstudiantes();
                    } else {
                        console.error('Error en la respuesta del servidor:', response.statusText);
                    }
                } catch (error) {
                    console.error('Error en la solicitud:', error);
                }

            });
            // Función para establecer eventos de clic
            function establecerEventos() {
                $('.delete-estudiante').click(function () {
                    estudianteCedula = $(this).data('id');
                    $('#deleteEmployeeModal').modal('show');
                });
                //ACTUALIZACIÓN
                // Evento click para abrir el modal de edición
                $('.edit').click(function () {

                    estudianteInfo = {
                        cedula: $(this).data('id'),
                        nombre: $(this).data('nombre'),
                        apellido: $(this).data('apellido'),
                        direccion: $(this).data('direccion'),
                        telefono: $(this).data('telefono'),
                        curId: $(this).data('curid')
                    };
                    $('#editEmployeeModal input[name="estCedula"]').val(estudianteInfo.cedula);
                    $('#editEmployeeModal input[name="estNombre"]').val(estudianteInfo.nombre);
                    $('#editEmployeeModal input[name="estApellido"]').val(estudianteInfo.apellido);
                    $('#editEmployeeModal input[name="estDireccion"]').val(estudianteInfo.direccion);
                    $('#editEmployeeModal input[name="estTelefono"]').val(estudianteInfo.telefono);


                    // Cargar cursos en el combo y seleccionar el curso del estudiante seleccionado
                    cargarCursos(true);
                    $('#editEmployeeModal').modal('show');
                    const cedulaEditar = document.querySelector("#cedula_editar");
                    cedulaEditar.disabled = true;

                });
            }

            $('#editEmployeeModal form').submit(function (e) {
                e.preventDefault();
                var cedula = $(this).find('input[name="estCedula"]').val();
                var nuevoNombre = $(this).find('input[name="estNombre"]').val();
                var nuevoApellido = $(this).find('input[name="estApellido"]').val();
                var nuevaDireccion = $(this).find('input[name="estDireccion"]').val();
                var nuevoTelefono = $(this).find('input[name="estTelefono"]').val();
                var nuevoCurso = $(this).find('select[name="curId"]').val();

                actualizarEstudiante(cedula, nuevoNombre, nuevoApellido, nuevaDireccion, nuevoTelefono, nuevoCurso);
            });

            // Función para actualizar estudiante
            async function actualizarEstudiante(cedula, nombre, apellido, direccion, telefono, curId) {
                console.log(cedula, nombre, apellido, direccion, telefono);
                let bodyContent = `estNombre=${nombre}&estApellido=${apellido}&estDireccion=${direccion}&estTelefono=${telefono}&curId=${curId}`;
                try {
                    const response = await fetch(url + "?estCedula=" + cedula, {
                        method: 'PUT',
                        body: bodyContent
                    });

                    if (response.ok) {
                        const jsonResponse = await response.json();
                        console.log(jsonResponse);

                        $('#editEmployeeModal').modal('hide');
                        cargarTablaEstudiantes();
                    } else {
                        console.error('Error en la respuesta del servidor:', response.statusText);
                    }
                } catch (error) {
                    console.error('Error en la solicitud:', error);


                }
            };

            //BUSCAR ESTUDIANTE
            async function buscarEstudiante() {
                const cedula = document.querySelector("#buscar-cedula").value;
                if (cedula === "") {
                    cargarTablaEstudiantes();
                } else {

                    try {
                        let response = await fetch(url + "?estCedula=" + cedula);
                        let data = await response.json();
                        console.log(data);
                        $('#employeeTable tbody').empty();
                        $.each(data, function (index, row) {
                            var tr = '<tr>' +
                                '<td>' + row.estCedula + '</td>' +
                                '<td>' + row.estNombre + '</td>' +
                                '<td>' + row.estApellido + '</td>' +
                                '<td>' + row.estDireccion + '</td>' +
                                '<td>' + row.estTelefono + '</td>' +
                                '<td>' + row.curNombre + '</td>' +
                                '<td class="acciones-col">' +
                                '<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="' + row.estCedula + '" data-nombre="' + row.estNombre + '" data-apellido="' + row.estApellido + '" data-direccion="' + row.estDireccion + '" data-telefono="' + row.estTelefono + '" data-curid="' + row.curId + '"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>' +
                                '<a href="#deleteEmployeeModal" class="delete-estudiante" data-id="' + row.cedula + '" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>' +
                                '</td>' +
                                '</tr>';
                            $('#employeeTable tbody').append(tr);
                        });

                        establecerEventos();
                        checkAccess();
                    } catch (error) {
                        console.log("Error al leer el json", error);

                    }
                }
            }


            $('#btn-cedula').click(function () {
                buscarEstudiante();
            });


            // Función para eliminar estudiante
            async function eliminarEstudiante(cedula) {
                try {
                    let response = await fetch(url + "?estCedula=" + cedula, {
                        method: 'DELETE'
                    });
                    if (response.ok) {
                        const jsonResponse = await response.json();
                        console.log(jsonResponse);
                        $('#deleteEmployeeModal').modal('hide'); // Ocultar el modal después de eliminar
                        cargarTablaEstudiantes(); // Recargar la tabla
                    } else {
                        console.error('Error en la respuesta del servidor:', response.statusText);
                    }
                } catch (error) {

                }

            }

            $('#confirmarEliminar').click(function () {
                eliminarEstudiante(estudianteCedula);
            });

        });



    </script>
</head>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h2>Administrador <b>Estudiantes</b></h2>
                    </div>
                    <div class="col-sm-3 d-flex justify-content-end">
                        <form class="d-flex">
                            <input type="text" id="buscar-cedula" class="form-control mr-2"
                                placeholder="Buscar por cédula">
                            <button id="btn-cedula" class="btn btn-primary" type="button">
                                <i class="material-icons">search</i> <!-- Icono de lupa -->
                            </button>
                        </form>
                    </div>
                    <!--<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar Estudiante</span></a>	-->
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" id="btnAgregarEstudiante"><i
                            class="material-icons">&#xE147;</i> <span>Agregar Estudiantes</span></a>
                </div>
            </div>
        </div>
        <table id="employeeTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Curso</th>
                    <th class="acciones-col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!--
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>-->
    </div>
</div>
</div>
<!-- ADD Modal HTML -->

<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addEmployeeForm">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Estudiantes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cedula</label>
                        <input id='cedula-editar' type="text" class="form-control" name="estCedula" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="estNombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="estApellido" required>
                    </div>
                    <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="form-control" name="estDireccion" required>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="estTelefono" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select class="form-control" id="curso" name="curId" required>
                            <!-- Opciones del combo cargadas dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Editar Estudiante</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cedula</label>
                        <input id="cedula_editar" type="text" class="form-control" name="estCedula" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="estNombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="estApellido" required>
                    </div>
                    <div class="form-group">
                        <label>Direccion</label>
                        <input class="form-control" name="estDireccion" required>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="estTelefono" required>
                    </div>
                    <div class="form-group">
                        <label for="cursoEdit">Curso</label>
                        <select class="form-control" id="cursoEdit" name="curId" required>
                            <!-- Opciones del combo cargadas dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Estudiante</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de eliminar este registro?</p>
                    <p class="text-warning"><small>Esta acción no se podrá deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <button type="button" id="confirmarEliminar" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>