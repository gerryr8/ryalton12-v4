    
<?php 
include "dataseconect.php";


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

<body style="background-image: url(green-concrete-wall.jpg);">

<?php include "header.php"?>
<section>
    <article>
        <h2 style="display: inline-block; margin-left: 10px; margin-right: 30px; color:rgb(17, 17, 43); font-weight: 500;">Forms</h2>
      
            <form action="#" method="get" style="display: inline-block;">
                <input class="search"type="search" placeholder="Search" name="search">
                <input class="search-btn" type="submit" value="Search" name="sent">           
            </form>
            <a style="margin-left: 30px;"href="admin.php"> Go back</a>
    </article>


    <?php 

if(isset($_GET['sent'])){

    $search = $_GET['search'];

    $query2 = "SELECT * FROM  resguardos 
    WHERE id_form LIKE '%$search%' 
    OR nombres LIKE '%$search%' 
    OR puesto LIKE '%$search%'
    OR n_anfitrion LIKE '%$search%'";

    $myresult = mysqli_query($conn, $query2);

}
?>

  

<table width="70%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="100% "border="0" bgcolor="#eeeeee">
                   
                    <?php 


if(isset($_GET['sent'])){
    
     ?>

<tr>
                        <td class="tbg" style="text-align: center;">N°</td>
                        <td class="tbg-">Host</td>
                        <td class="tbg">Name</td>
                        <td class="tbg">Position</td>
                        <td class="tbg-" style="text-align: center;">Action</td>
        </tr>
<?php


                
    while ($row = mysqli_fetch_assoc($myresult)){ 
        ?>
         
        <tr>
                        <td style="text-align: center;"><?php echo $row['id_form'];?></td>
                        <td style="text-align: center;"><?php echo $row['n_anfitrion'];?></td>
                        <td style="text-align: center;"><?php echo $row['nombres'];?></td>
                        <td style="text-align: center;"><?php echo $row['puesto'];?></td>
                        <td style="text-align: center; color: red;"><a href="users_form.php?id=<?php echo urlencode($row['id_form'])?>">Sign</a></td>
                        
        </tr><?php   
    }

   
}else{?>
       <tr>
                        <td class="tbg" style="text-align: center;">N°</td>
                        <td class="tbg-">Host</td>
                        <td class="tbg">Name</td>
                        <td class="tbg">Position</td>
                        <td class="tbg-" style="text-align: center;">Action</td>
                    </tr>
                    <?php

    $query="SELECT * FROM resguardos ORDER BY id_form";
    $result = mysqli_query($conn, $query);


   while ($row = mysqli_fetch_assoc($result)) {?>

                 
   
                    <tr>
                        <td style="text-align: center;"><?php echo $row['id_form'];?></td>
                        <td style="text-align: center;"><?php echo $row['n_anfitrion'];?></td>
                        <td style="padding-left: 5px;"><?php echo $row['nombres'];?></td>
                        <td style="padding-left: 5px;"><?php echo $row['puesto'];?></td> 
                        <td style="text-align: center; color: red;"><a href="users_form.php?id=<?php echo urlencode($row['id_form'])?>">Sign</a></td>
                    </tr>
   <?php }
    
}

                  
     ?>



        


                </table>
            </td>
        </tr>
</table>

   </section>


   

    

 

    <!--<script type="text/javascript">
function onFormSubmit(e) {

    const img onFormSubmit;

}

</script>
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="app.js"></script>
    <script type="text/javascript">
        document.getElementById('send').addEventListener('click', function(e){
            e.preventDefault();
            console.log('send');
           
        });
    </script>-->

     
</body>
</html>