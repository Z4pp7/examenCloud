<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
session_start();
include'./Modelo.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
              <script src="css/jquery-2.1.4.js"></script>
             <script src="css/bootstrap-table.js"></script>
            <link href="css/bootstrap-table.css" rel="stylesheet">
            
        <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="css/examen.css">
    

    </head>
    <body>


        <form action="Controller.php" name="form">

            <section class="datos">
                <div>Código</div>
                <i class="ico fas fa-barcode" aria-hidden="true"></i>
                <input type="text" 
                       name="codigo" 
                       class="codigo"
                       placeholder="Código"  
                       required/></br>

                <div>DescripciÓn</div>
                <i class="ico fas fa-tag" aria-hidden="true"></i>
                <input type="text" 
                       name="descripcion" 
                       class="codigo"
                       placeholder="Descripción"  
                       required/></br>

                <div>Cantidad</div>
                <i class="ico_c fas fa-boxes" aria-hidden="true"></i>
                <input type="text" 
                       name="cantidad" 
                       class="codigo"
                       placeholder="Cantidad"  
                       required/></br>
                <div>Precio</div>
                <i class="ico_p fas fa-dollar-sign" aria-hidden="true"></i>
                <input type="text" 
                       name="precio" 
                       class="codigo"
                       placeholder="Precio"  
                       required/></br>

                <input type="hidden" value="guardar" name="opcion">
                <button type="submit" class="button">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>


        </form>


        <form action="Controller.php" name="form">

            <input type="hidden" value="cargar_lista" name="opcion">
            <button type="submit" class="button">
                <i class="ico_guardar far fa-file-archive" aria-hidden="true"></i>
            </button>

        </form>


    </section>



    <section class="datosTabla">
        <table class="display" data-toggle="table"> 
            <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>ELIMINAR</th>
                    <th>ACTUALIZAR</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['lista'])) {

                    $registro = unserialize($_SESSION['lista']);

                    foreach ($registro as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato->getCodigo() . "</td>";
                        echo "<td>" . $dato->getDescripcion() . "</td>";
                        echo "<td>" . $dato->getCantidad() . "</td>";
                        echo "<td>" . $dato->getPrecio() . "</td>";

                        echo "<td>   
                                

                        <form action=\"eliminar.php\" name=\"form\">
                            <input type=\"hidden\" value=\"" . $dato->getCodigo() . "\" name=\"eliminar\">
                            <button type=\"submit\" class=\"button_tbl\" >
                                  <i class=\"ico_borrar fas fa-trash\" aria-hidden=\"true\"></i>
                            </button> </form></td> ";



                        echo"<td>   
                                

                        <form action=\"actualizarC.php\" name=\"form\">
                            <input type=\"hidden\" value=\"" . $dato->getCodigo() . "\" name=\"actualizar\">
                            <button type=\"submit\" class=\"button_tbl\">
                                <i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i>
                            </button> </form></td> ";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

    </section>


</body>
</html>
