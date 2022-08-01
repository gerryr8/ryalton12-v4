<?php 

include "dataseconect.php";


$conn = mysqli_connect($servername, $username, $password, $database);



$email=$_POST['email'];
$password=$_POST['password'];


$query= "SELECT * from usuarios WHERE email='$email' and pass='$password'";

$result=mysqli_query($conn, $query);

$row=mysqli_fetch_array($result);

  
  if($row['rol'] ==1)
  {
    
    session_start(); 
  
    $_SESSION['email']=  $row['email'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellido']=$row['apellido'];

      header("location: admin.php");
  }
  else{

    if($row['rol'] ==2)
    {
      session_start();
   
      $_SESSION['email']=  $row['email'];
      $_SESSION['nombre'] = $row['nombre'];
      $_SESSION['apellido']=$row['apellido'];
      header("location: user.php");
      

    }
    else
    {?>
      <script>window.alert("Correo o contraseña inválidos");
                window.location.href='login.php';
                </script>  <?php
    }

    
  }







?>