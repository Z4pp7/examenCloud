<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();

include './Modelo.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        $cod = unserialize($_SESSION['pro']);
        ?>

        <form action="./Controller.php" name="form">
            <section class="datos">
                <div>Codigo</div>
                <input type="text" 
                       name="codigo" 
                       placeholder="codigo"  
                       value="<?php  echo $cod->getCodigo(); ?>"
                       enabled="true"
                       required/></br>

                <div>Descripcion</div>
                <input type="text" 
                       name="descripcion" 
                       placeholder="descripcion"  
                         value="<?php  echo $cod->getDescripcion(); ?>"
                       required/></br>

                <div>Cantidad</div>
                <input type="text" 
                       name="cantidad" 
                       placeholder="cantidad"  
                         value="<?php  echo $cod->getCantidad(); ?>"
                       required/></br>
                <div>Precio</div>
                <input type="text" 
                       name="precio" 
                       placeholder="precio"  
                         value="<?php echo $cod->getPrecio(); ?>"
                       required/></br>
                <input type="hidden" value="actualizar" name="opcion">
                <button type="submit" >
                    GUARDAR
                </button>
            </section>
        </form>


    </body>
</html>
