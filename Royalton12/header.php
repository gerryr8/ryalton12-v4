<?php include "dataseconect.php";

  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado


?>
<head>
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <link rel="stylesheet" href="css/admin.css?v=<?php echo(rand()); ?>" />
<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resguardo de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/btstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
   
    <script src="app.js"></script>
</head>

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