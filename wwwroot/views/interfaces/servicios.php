<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</head>
<body>
    <h2>Registro de Estudiantes</h2>
    <p>Seleccione lo que desea realizar.</p>

    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:800px;height:350px" url="models/acceder.php"
     toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="estCedula" width="50">Cédula</th>
                <th field="estNombre" width="50">Nombre</th>
                <th field="estApellido" width="50">Apellido</th>
                <th field="estTelefono" width="50">Teléfono</th>
                <th field="estDireccion" width="50">Dirección</th>
                <th field="curNombre" width="50">Curso</th>
                <th field="curId" hidden="true">ID Curso</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Usuario</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Usuario</a>
        <a href="../cuarto/reportes/reporte.php" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="reporteTotal()">Reporte Total</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="reporteUnico()">Reporte Unico</a>
        <a href="../cuarto/phpJasperXML_2.0.1/examples/prueba.php" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Reporte Irreport</a>
    </div>

    <!-- Contenido del diálogo y formularios aquí -->

    <script type="text/javascript">
        var url;

        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Usuario');
            $('#fm').form('clear');
            url = 'models/guardar.php';
        }

        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Usuario');
                $('#fm').form('load', row);
                url = 'models/editar.php';
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                iframe: false,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(result) {
                    var result = eval('(' + result + ')');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close'); // close the dialog
                        $('#dg').datagrid('reload'); // reload the user data
                    }
                }
            });
        }

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirmar', '¿Estás seguro que deseas eliminar?', function(r) {
                    if (r) {
                        $.post('models/borrar.php', {
                            cedula: row.estCedula
                        }, function(result) {
                            if (!result.success) {
                                $('#dg').datagrid('reload'); // reload the user data
                            } else {
                                $.messager.show({ // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        function reporteUnico() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                window.open('../cuarto/reportes/reporteUnico.php?estCedula=' + row.estCedula);
            }
        }
    </script>
</body>

</html>
