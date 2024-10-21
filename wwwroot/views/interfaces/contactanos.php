<?php
    include './models/lista.php';
    $estudiantes = ObtenerEstudiantes();
?>

<html>
    <head>

    </head>
    <body>

    <form action="./models/agregarest.php" method="post">
        <label for="estCedula">Cédula:</label>
        <input type="text" id="estCedula" name="estCedula" required><br>

        <label for="estNombre">Nombre:</label>
        <input type="text" id="estNombre" name="estNombre" required><br>

        <label for="estApellido">Apellido:</label>
        <input type="text" id="estApellido" name="estApellido" required><br>

        <label for="estDireccion">Dirección:</label>
        <input type="text" id="estDireccion" name="estDireccion" required><br>

        <label for="estTelefono">Teléfono:</label>
        <input type="text" id="estTelefono" name="estTelefono" required><br>

        
        <label for="curId">Curso</label>
        <select name="curId" id="curId">
            <?php
                $cursos = ObtenerCursos();
                foreach ($cursos as $curso) {
                    echo "<option value='".$curso['curId']."'>".$curso['curNombre']."</option>";
                }
            ?>
        </select>

        <input type="submit" value="Agregar Estudiante">
    </form>
        <table>
            <tr>
                <th>NOMBRE</th>
                <TH>APELLIDO</TH>
            </tr>
            <?php
            foreach ($estudiantes as $estudiante) {
                echo "<tr>";
                echo "<td>".$estudiante['estNombre']."</td>";
                echo "<td>".$estudiante['estApellido']."</td>";
                echo ("</tr>") ;
            }
            ?>
        </table>
    </body>
</html>