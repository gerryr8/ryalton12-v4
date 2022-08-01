<?php 

include "dataseconect.php";

$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];

$insert="INSERT INTO usuarios (nombre, apellido, email, pass, rol) VALUES ('$name', '$lastname' , '$email', '$password',  '$role')";

$check_user="SELECT * FROM usuarios WHERE email='$email'";

$execute=mysqli_query($conn, $check_user);

$row=mysqli_fetch_array($execute);

if(isset($row)){?>
    <script>window.alert("Este correo ya existe");
                window.location.href='registro.php';
                location.reload();</script> <?php
}else{
    $execute=mysqli_query($conn, $insert);

    ?> <script>window.alert("Usuario agregado correctamente");
                window.location.href='registro.php';
                location.reload();</script>  <?php
}



?>
<body style="background-color: #29b3c3">

</body>