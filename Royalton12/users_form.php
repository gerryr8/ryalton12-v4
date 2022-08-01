
<?php include("dataseconect.php");



  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado


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
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="app.js"></script>
    <link rel="stylesheet" href="css/admin.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/form.css?v=<?php echo(rand()); ?>" />
    <title>User forms</title>
</head>
<body style="background-image: url(green-concrete-wall.jpg);">
    
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
<h2 style="font-weight:500; display: inline; margin-left:10%;">Sign Forms</h2>
    <a href="javascript:history.back()"> Go back</a>
<div class="form">

  
    <?php 

    $id=$_GET['id'];

    $query="SELECT * FROM resguardos WHERE id_form ='$id'";

    $res=mysqli_query($conn, $query);
    
    $row = mysqli_fetch_assoc($res)?>
        <!--                
        <h2>Nombre: <?php /* echo $row['nombres'];?></h2>
        <h2>Departamento: <?php echo $row['departamento'];?></h2>
        <h2>Puesto: <?php echo $row['puesto']; */?></h2>-->
       
<form action="sign.php?id=<?php echo urlencode($row['id_form'])?>" id="form" method="post"> 

<table width="80%">
    <tr>
        <td>Department</td>
        <td><?php echo $row['departamento'];?></td>
    </tr>
    <tr>
        <td>Last names</td>
        <td><?php echo $row['nombres'];?></td>
    </tr>
    <tr>
        <td>Position</td>
        <td><?php echo $row['puesto'];?></td>
    </tr>
    <tr>
        <td>N° Host</td>
        <td><?php echo $row['n_anfitrion'];?></td>
    </tr>
                                 <?php 
                                if(empty($row['nhotel'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>New Hotel</td>
                                     <td><?php echo $row['nhotel'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['npost'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>New Post</td>
                                     <td><?php echo $row['npost'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['nspa'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>New Spa</td>
                                     <td><?php echo $row['nspa'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['nchange'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>New Change</td>
                                     <td><?php echo $row['nchange'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['usremoto'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Remote User</td>
                                     <td><?php echo $row['usremoto'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['correo'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Email</td>
                                     <td><?php echo $row['correo'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['internet'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Internet</td>
                                     <td><?php echo $row['internet'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['pin'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Pin</td>
                                     <td><?php echo $row['pin'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['vincard'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Vin card</td>
                                     <td><?php echo $row['vincard'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['aplicativo'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Aplicativo</td>
                                     <td><?php echo $row['aplicativo'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['asistencia'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Assistance</td>
                                     <td><?php echo $row['asistencia'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['zafiro'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Zafiro</td>
                                     <td><?php echo $row['zafiro'];?></td>
                                 </tr>
                                <?php  }?>
                                <?php 
                                if(empty($row['verkada'])){?> 
                                   
                                  <?php } else{?>
                                     <tr>
                                     <td>Verkada</td>
                                     <td><?php echo $row['verkada'];?></td>
                                 </tr>
                                <?php  }?>
                        
    
</table>
                    
                

                            
    
<br>
<div>
<!--
<span class="d-block pb-2">Firma digital aqui</span>
                                                                    <div class="signature mb-2" style="width: 80px; height: 100px;">
                                                                        <canvas id="signature-canvas" style="border: 1px dashed red; width: 200px; height: 100px;"></canvas>
    
    <l                                                                </div>-->
<label>Firma</label>
    <input type="radio" name="firma" value="Firma" required>


                                                                    <button type="submit" class="btn-reg" id="send" style="width:80px; margin-top: 20px;">
                                                            Sent</button>
</div>
                                                                  
                                                            
</form>

                </section>



                              
</form >
      

</body>
</html>