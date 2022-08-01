

<?php 

include "dataseconect.php";

$id=$_GET['id'];

$firma=$_POST['firma'];

$insert="UPDATE resguardos SET firma='$firma' WHERE id_form='$id' ";


$execute=mysqli_query($conn, $insert);

if($execute){?>
    <script>window.alert("Reporte Firmado");
                window.location.href='admin.php';
                location.reload();</script> <?php

}else{
    
    ?>
    <script>window.alert("Falló al firmar el reporte");
                window.location.href='admin.php';
                location.reload();</script> <?php


}


?>