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
        url="http://localhost/ProyectoServicios/Proyecto-Servicios/wwwroot/controllers/apiRest.php"
        toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" method="GET">
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
        <input id="searchCedula" class="easyui-textbox" prompt="Buscar por cédula" style="width:200px;">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" onclick="buscarPorCedula()">Buscar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" onclick="recargar()">Refrescar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()" id="btnNewUser">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()" id="btnEditUser">Editar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()" id="btnDestroyUser">Eliminar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="cargarReporte()">Reporte Completo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="cargarReporteIndividual()">Reporte Individual</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="generarInforme()">Ireport</a>

    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
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
                <input id="curId" name="curNombre" class="easyui-combobox" required="true" label="Curso:" style="width:100%" prompt="Seleccione un curso">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

    <script type="text/javascript">
        let url = "http://localhost/ProyectoServicios/Proyecto-Servicios/wwwroot/controllers/apiRest.php";

        var metodo;
        
        $(document).ready(function() {
            checkAccess();
        });

        
        function checkAccess() {
            const accessKey = sessionStorage.getItem('accessKey'); 

            if (!accessKey) {
                $('#btnNewUser').hide();
                $('#btnEditUser').hide();
                $('#btnDestroyUser').hide();
            }
        }


        function newUser() {
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Estudiante');
            $('#fm').form('clear');
            cargarCursos();
            metodo = 'POST';
        }

        function editUser() {
            var row = $('#dg').datagrid('getSelected');

            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Usuario');
                $('#fm').form('load', row);

                cargarCursos(row.curNombre); // Llama a cargarCursos con el curso actual del estudiante

                url = "http://localhost/ProyectoServicios/Proyecto-Servicios/wwwroot/controllers/apiRest.php?estCedula=" + row.estCedula;
                metodo = 'PUT';
            }
        }


        function saveUser() {
            var formData = $('#fm').serialize();
            $.ajax({
                url: url,
                method: metodo, 
                data: formData,
                success: function (result) {
                    console.log("Respuesta del servidor:", result);
                    try {
                        var parsedResult = JSON.parse(result);
                        if (parsedResult.errorMsg) {
                            $.messager.show({
                                title: 'Error',
                                msg: parsedResult.errorMsg
                            });
                        } else {
                            $('#dlg').dialog('close');  
                            $('#dg').datagrid('reload');  
                        }
                    } catch (error) {
                        $.messager.show({
                            title: 'Error',
                            msg: 'Error al procesar la respuesta del servidor.'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    $.messager.show({
                        title: 'Error',
                        msg: 'Error en la solicitud.'
                    });
                }
            });
        }

        function recargar(){
            $('#dg').datagrid('reload'); 
            $('#searchCedula').textbox('clear');
        }

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirmar', 'Estas seguro de eliminar?', function (r) {
                    if (r) {
                        $.ajax({
                            url: `${url}?estCedula=${row.estCedula}`,
                            method: 'DELETE',
                            success: function (result) {
                                if (!result.success) {
                                    $.messager.show({
                                        title: 'Success',
                                        msg: 'El estudiante se ha eliminado.'
                                    });
                                    $('#dg').datagrid('reload');
                                } else {
                                    $.messager.show({
                                        title: 'Error',
                                        msg: result.errorMsg
                                    });
                                }
                            }
                        });
                    }
                });
            }
        }


        async function cargarCursos(selectedCurso = null) {
        try {
        let response = await fetch(`${url}?cursos`);
        let data = await response.json();

        $('#curId').combobox({
            valueField: 'curId',
            textField: 'curNombre',
            data: data,
            onLoadSuccess: function() {
                // Selecciona el curso actual del estudiante si está en modo edición
                if (selectedCurso) {
                    $('#curId').combobox('setValue', selectedCurso);
                }else{
                    $('#curId').combobox('clear'); 
                }
            }
        });
    } catch (error) {
        console.error('Error al cargar los cursos:', error);
    }
}

        
        function cargarReporte() {
            window.location.href = 'reportes/reporte.php'
        }

        function cargarReporteIndividual() {
            var row = $('#dg').datagrid('getSelected');

            if (row) {
                console.log(row.est_cedula);
                window.open('reportes/reporteUnico.php?estCedula=' + row.estCedula)
            }
        }

        function generarInforme() {
            window.open("phpJasperXML_2.0.1/examples/ireport.php")
        }

        function buscarPorCedula() {
        const cedula = $('#searchCedula').textbox('getValue');
        $('#dg').datagrid('load', { estCedula: cedula });
        }


        function buscarPorCedula() {
            const cedula = $('#searchCedula').textbox('getValue'); // Obtener la cédula ingresada

            if (cedula) {
                // Llamar a la API para buscar por cédula
                $.ajax({
                    url: url + "?estCedula=" + cedula,
                    method: 'GET',
                    success: function (data) {
                        try {
                            const resultado = JSON.parse(data);

                            if (Array.isArray(resultado)) {
                                // Si hay resultados, cargar el estudiante en la tabla
                                $('#dg').datagrid('loadData', resultado);
                            } else {
                                // Si no hay resultados, mostrar un mensaje
                                $.messager.alert('No encontrado', resultado, 'info');
                                $('#dg').datagrid('loadData', []); // Limpiar tabla si no hay datos
                            }
                        } catch (error) {
                            console.error('Error al procesar los datos de la respuesta:', error);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error en la solicitud:', error);
                        $.messager.alert('Error', 'Hubo un problema con la búsqueda', 'error');
                    }
                });
            } else {
                // Si el campo está vacío, cargar todos los estudiantes
                $('#dg').datagrid('reload'); 
            }
        }


    </script>

</body>

</html>
