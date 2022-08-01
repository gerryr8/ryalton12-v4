<?php 
session_start();

$varsession=$_SESSION['email'];
if($varsession == null || $varsession = ''){

echo("Inicia sesión");
header("Location: login.php");

die();
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <link rel="stylesheet" href="css/admin.css?v=<?php echo(rand()); ?>" />
<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
   

    <title>Resguardo de equipos</title> 
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
   
    <script src="app.js"></script>
  
    <title>Registro de Usuarios</title>
</head>
<body style="background-image:url(green-concrete-wall.jpg);">
<header>
    <div class="flex" style="position: relative;">
        <div class="logo" style="position:relative; left:10%;">
            <img class="royal" width="95%" height="auto"src="royal.png">
          </div>
          <div class="user" style="position: relative; left:10%;">
        <h3 style="position:relative; color: white; font-weight: 500;">Welcome: <br><?php echo  $_SESSION['nombre'];  ?> <?php echo $_SESSION['apellido']; ?></h3>
</div>
        <div class="link" style="position: relative; left:10%;">
            <a href="registro.php">User Register</a>
        </div>
        <div class="link">
         <a href="cerrar.php">Sign Off</a>
        </div>
    </div>
</header>
<section class="register">
    <div style="display: flex; ">
    <div style="display:flex-box; width:40%; margin-right: 10%;">
    <h2 style="padding-bottom: 20px; font-weight: 500;">User Register</h2>
  
    <form action="insert_register.php" method="post"">
        <input class="regis" type="name" placeholder="Name" required name="name" style="display: block; margin-bottom:10px;">
        <input class="regis" type="name" placeholder="Last name" required name="lastname" style="display: block; margin-bottom:10px;">
        <input class="regis" type="email" placeholder="Email" required name="email" style="display: block; margin-bottom:10px;">
        <input class="regis" type="password" placeholder="Password" required name="password" style="display: block; margin-bottom:10px;">
        <h3 style="padding-bottom: 10px; font-weight: 500;">Authority</h3>
        <select required name="role" style="display: block; margin-bottom:20px;">
            <option value="1">Admin</option>
            <option selected value="2">User</option>
        </select>
        <input class="btn-reg"type="submit" value="Add" style="display: inline-block; margin-bottom:10px;">
        <a style="margin-left: 30px;"href="admin.php"> Go back</a>
    </form>


</div>


<div style="display: flex-box;  height: auto; width: 80%;">
    <h2 style="padding-bottom: 20px; font-weight: 500;">Added Users</h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="100% "border="0">
                    <tr>
    
                        <td class="tbg" >Name</td>
                        <td class="tbg">Last name</td>
                        <td class="tbg">Email</td>
                        <td class="tbg">Role</td>
                    </tr>
                    <?php 
                    include "dataseconect.php";


                         $query="SELECT * FROM usuarios";
                         $result = mysqli_query($conn, $query);

                         //function(if =1 admin 2 rol);
                        while ($row = mysqli_fetch_assoc($result)) {?>
                        
                    <tr>
                        <td style="padding-left: 5px;"><?php echo $row['nombre'];?></td>
                        <td style="padding-left: 5px;"><?php echo $row['apellido'];?></td>
                        <td style="padding-left: 5px;"><?php echo $row['email'];?></td>
                        <td style="text-align: center;"><?php echo $row['rol'];?></td>

                    </tr>
                    <?php }
                  
                    ?>
                </table>

    </div>
                        </div>
</section>
  
   
    
</body>
</html>