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
        <title></title>
    </head>
    <body>


        <form action="Controller.php" name="form">

            <div>Codigo</div>
            <input type="text" 
                   name="codigo" 
                   placeholder="codigo"  
                   required/></br>

            <div>Descripcion</div>
            <input type="text" 
                   name="descripcion" 
                   placeholder="descripcion"  
                   required/></br>

            <div>Cantidad</div>
            <input type="text" 
                   name="cantidad" 
                   placeholder="cantidad"  
                   required/></br>
            <div>Precio</div>
            <input type="text" 
                   name="precio" 
                   placeholder="precio"  
                   required/></br>
            <input type="hidden" value="guardar" name="opcion">
            <button type="submit" >
                GUARDAR
            </button>


        </form>



        <form action="Controller.php" name="form">

            <input type="hidden" value="cargar_lista" name="opcion">
            <button type="submit" >
                VER LISTADO
            </button>

        </form>






        <table > 
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
                            <input type=\"hidden\" value=\"".$dato->getCodigo() ."\" name=\"eliminar\">
                            <button type=\"submit\" >
                                ELIMINAR
                            </button> </form></td> ";



                        echo"<td>   
                                

                        <form action=\"actualizarC.php\" name=\"form\">
                            <input type=\"hidden\" value=\"".$dato->getCodigo(). "\" name=\"actualizar\">
                            <button type=\"submit\" >
                                ACTUALIZAR
                            </button> </form></td> ";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>

    


</body>
</html>
