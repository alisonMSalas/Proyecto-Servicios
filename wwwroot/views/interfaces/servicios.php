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

    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:98%;height:350px"
        url="http://localhost:8081/proyectoQuinto/Proyecto-Servicios/wwwroot/controllers/apiRest.php" toolbar="#toolbar"
        pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" method="GET">
        <thead>
            <tr>
                <th field="estCedula" width="50">Cedula</th>
                <th field="estNombre" width="50">Nombre</th>
                <th field="estApellido" width="50">Apellido</th>
                <th field="estDireccion" width="50">Direccion</th>
                <th field="estTelefono" width="50">Telefono</th>
                <th field="curNombre" width="50">Curso</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo
            Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true"
            onclick="editUser()">Editar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
            onclick="destroyUser()">Eliminar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
            onclick="cargarReporte()">Reporte Completo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
            onclick="cargarReporteIndividual()">Reporte Individual</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
            onclick="generarInforme()">Ireport</a>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px"
        data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Información Estudiante</h3>
            <div style="margin-bottom:10px">
                <input name="estCedula" class="easyui-textbox" required="true" label="Cedula" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="estNombre" class="easyui-textbox" required="true" label="Nombre" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="estApellido" class="easyui-textbox" required="true" label="Apellido" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="estDireccion" class="easyui-textbox" required="true" label="Direccion" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="estTelefono" class="easyui-textbox" required="true" label="Telefono" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input id="cur" name="curId" class="easyui-combobox" required="true" label="Curso:" style="width:100%"
                    prompt="Seleccione un curso">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()"
            style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel"
            onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Estudiante');
            $('#fm').form('clear');
            cargarCursos();
            url = 'http://localhost:8081/proyectoQuinto/Proyecto-Servicios/wwwroot/controllers/apiRest.php';
        }
        function editUser() {
            var row = $('#dg').datagrid('getSelected');

            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Usuario');
                $('#fm').form('load', row);
                console.log("-----------" + row.curId);

                url = 'http://localhost:8081/proyectoQuinto/Proyecto-Servicios/wwwroot/controllers/apiRest.php?cedula=' + row.estCedula;
            }
        }
        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                iframe: false,
                onSubmit: function () {
                    return $(this).form('validate');
                },
                success: function (result) {
                    var result = eval('(' + result + ')');
                    if (result.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                    }
                }
            });
        }

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirmar', 'Estas seguro de eliminar?', function (r) {
                    if (r) {
                        $.post('model/borrar.php', { cedula: row.est_cedula }, function (result) {
                            if (!result.success) {
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }

        async function cargarCursos() {
            try {
                let response = await fetch('http://localhost:8081/proyectoQuinto/Proyecto-Servicios/wwwroot/controllers/apiRest.php?cursos');
                let data = await response.json();
                $('#cur').combobox({
                    valueField: 'curId',
                    textField: 'curNombre',
                    data: data
                });
            } catch (error) {
                console.error('Error al cargar los cursos:', error);
            }
        }
        /*
        function cargarReporte() {
            window.location.href = 'reportes/reporte.php'
        }


        function cargarReporteIndividual() {
            var row = $('#dg').datagrid('getSelected');

            if (row) {
                console.log(row.est_cedula);
                window.open('reportes/reporteIndividual.php?est_cedula=' + row.est_cedula)
            }
        }
        function generarInforme() {
            window.open("phpJasperXML_2.0.1/examples/ireport.php")
        }*/

    </script>

</body>

</html>