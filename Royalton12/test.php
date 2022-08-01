<?php include "dataseconect.php";

error_reporting(0);
$departamento = $_POST['departamento'];
$nombres = $_POST['nombres'];
$puesto = $_POST['puesto'];
$n_anfitrion = $_POST['n_anfitrion'];

$nhotel = $_POST['nhotel'];
$npost = $_POST['newposts'];
$nspas = $_POST['newspas'];
$nchange = $_POST['newchanges'];
$usremoto = $_POST['usuarioremotos'];
$correoe = $_POST['correoelectronicos'];
$internet = $_POST['internets'];
$pin = $_POST['pins'];
$vision = $_POST['visions'];
$aplicativo  = $_POST['aplicativos'];
$asistencia = $_POST['asistencias'];
$zafiros = $_POST['zafiros'];
$verkada = $_POST['consolas'];




$consulta = "INSERT INTO resguardos (departamento, nombres, puesto, n_anfitrion, 
nhotel, npost, nspa, nchange, usremoto, correo, internet, pin, vincard, aplicativo, 
asistencia, zafiro, verkada)
 VALUES ('$departamento','$nombres','$puesto','$n_anfitrion',
 '$nhotel','$npost','$nspas','$nchange','$usremoto','$correoe','$internet','$pin','$vision',
 '$aplicativo','$asistencia','$zafiros','$verkada')";


$query = mysqli_query($conn, $consulta);

if($query){?>
    <script>window.alert("Reporte enviado");
                window.location.href='user.php';
                location.reload();</script> <?php

}else{
    
    ?>
    <script>window.alert("Falló al enviar tu reporte");
                window.location.href='user.php';
                location.reload();</script> <?php


}

?>


























