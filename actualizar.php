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
        <title>Actualizar</title>

        <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="css/examen.css">
    </head>
    <body>

        <?php
        $cod = unserialize($_SESSION['pro']);
        ?>

        <form action="./Controller.php" name="form">

            <section class="datos">
                <div>Código</div>
                <i class="ico fas fa-barcode" aria-hidden="true"></i>
                <input type="text" 
                       name="codigo" 
                       class="codigo"
                       value="<?php echo $cod->getCodigo(); ?>"
                       readonly="readonly"
                       placeholder="Código"  
                       required/></br>

                <div>DescripciÓn</div>
                <i class="ico fas fa-tag" aria-hidden="true"></i>
                <input type="text" 
                       name="descripcion" 
                       value="<?php echo $cod->getDescripcion(); ?>"

                       class="codigo"
                       placeholder="Descripción"  
                       required/></br>

                <div>Cantidad</div>
                <i class="ico_c fas fa-boxes" aria-hidden="true"></i>
                <input type="text" 
                       name="cantidad" 
                       class="codigo"
                             value="<?php echo $cod->getCantidad(); ?>"
                       placeholder="Cantidad"  
                       required/></br>
                <div>Precio</div>
                <i class="ico_p fas fa-dollar-sign" aria-hidden="true"></i>
                <input type="text" 
                       name="precio" 
                         value="<?php echo $cod->getPrecio(); ?>"
                       class="codigo"
                       placeholder="Precio"  
                       required/></br>

                <input type="hidden" value="actualizar" name="opcion">
                <button type="submit" class="button">
                    <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                </button>


        </form>



    </section>



</form>


</body>
</html>
