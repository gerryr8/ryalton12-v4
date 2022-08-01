<?php error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "80,90,92,91,99,95,100";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}
global $mensaje_html;
$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}

require_once('../Connections/localhost.php');
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maritur</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }
    .mensaje {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 14px;
        font-weight: normal;
        font-variant: normal;
        text-transform: uppercase;
        color: #333333;
    }
    label {
        display: block;
        
    }
    
    input, label {
        margin: .4rem 0;
    }
    .p50 {
        padding: 50px;
    }
</style>

<body>
    <?php include 'topgeneralmenu.php'; ?>
    <div align="center" class="p50">
    <?php
        mysql_select_db($database_localhost, $localhost);
        $query_btotal ="SELECT * FROM transporta WHERE id = '".$_SESSION['CARD_ID']."'";
        $transporta = mysql_query($query_btotal, $localhost) or die(mysql_error());
        $row_transporta = mysql_fetch_assoc($transporta);
        $_SESSION['MAIL_CLIENT'] =  $_POST['email'];
    ?>

    <?php 
        $customername = $row_transporta['customername'];
        $hotelname = explode(" ", $row_transporta['hotelname']);
        //$vehicletype = explode(" ", $row_transporta['txtvehicle']);
        $arrivaldate = date_create($row_transporta['arrivaldate']);
        $departuredate = date_create($row_transporta['departuredate']);
        $arrivaltime = strtotime($row_transporta['aarrivaltime']);
        $departuretime = strtotime($row_transporta['bdeparturetime']);
        $dpickuptime = strtotime($row_transporta['pickupb']);
        $comentarioscarta = $row_transporta['comentarioscarta'];

/* Fondo */
        // switch ($_POST['idioma']) {
        //     case "INGT4":
        //         $fondo = 'https://www.maritur.com/wp-content/uploads/2019/08/terminal_4.jpg';
        //         break;
        //     case "INGT3":
        //         $fondo = 'https://www.maritur.com/wp-content/uploads/2019/08/terminal_3.jpg';
        //         break;
        //     case "INGT2":
        //         $fondo = 'https://www.maritur.com/wp-content/uploads/2019/08/terminal_2.jpg';
        //         break;
        // }
        
        //variables para el html
        
        $firma = $_SESSION['MM_nombre'];
        $mail = $_SESSION['MM_Usermail'];
        $_SESSION['SECOND_MAIL'] =  $_POST['secondemail'];
        // echo $_SESSION['SECOND_MAIL'];
        
        //TEXTO ARRIVAL
        

        //TEXTO DEPARTURE
        if ($row_transporta['departuredate'] != "0000-00-00") {
            $fecha_departure = date_format($departuredate,"M jS, Y");
            $vuelo_departure = $row_transporta['bflightnumber'];
            $tiempo_departure = date("H:i", $departuretime).' hrs';
            $tiempo_fromhotel_departure = date("H:i", $dpickuptime).' hrs';
            if ($row_transporta['numberofchild'] != "0") {
                $pasajeros_departure = $row_transporta['numberofadult'].".".$row_transporta['numberofchild'];
            } else {
                $pasajeros_departure = $row_transporta['numberofadult'];
            }
            $id_departure = $row_transporta['id'];
            $vehiculo_departure = $_POST['dvehicle'];
            $hotel_departure = $row_transporta['hotelname'];
            $precio_departure = '$'.$_POST['priced'];
        }
        if ($row_transporta['arrivaldate'] != "0000-00-00") {
            $ar = 1;
            $fecha_arrival = date_format($arrivaldate,"M jS, Y");
            $vuelo_arrival = $row_transporta['aflightnumber'];
            $tiempo_arrival = date("H:i", $arrivaltime). ' hrs';
            if ($row_transporta['numberofchild'] != "0") {
                $pasajeros_arrival = $row_transporta['numberofadult'].".".$row_transporta['numberofchild'];
            } else {
                $pasajeros_arrival = $row_transporta['numberofadult'];
            }
            $id_arrival = $row_transporta['id'];
            $vehiculo_arrival = $_POST['avehicle'];
            $hotel_arrival = $row_transporta['hotelname'];
            $precio_arrival = '$'.$_POST['pricea'];
        }

        

        
        //##########################################
        //###########INICIO -------------MENSAJE QUE SE ENVIARÁ AL CORREO
        //#########################################

$mensaje_html = '
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
	xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niramit&display=swap" rel="stylesheet"> 
  
    <title>Confirmation Card</title>

	<style type="text/css">

			h4{font-family: Niramit, sans-serif; color: rgb(18, 48, 18); font-size: 13px; font-weight:500;  line-height: 14px;}
			#text-a{font-family: Niramit, sans-serif; color: rgb(20, 20, 20); font-size: 14px; font-weight:500;  line-height: 14px; text-size-adjust: none;  line-height: 1;}
			
			hr{background-color:rgb(18, 48, 18); height: 1px; border: none;}
			#columna-1 {display: inline; position:relative;top:0px;left:0px;width:45%;margin-top:10px;}
			#columna-2 { display: inline;margin-top:10px;width:45%; position: relative;}
						
			#columna-3 {display: inline; position:relative;top:0px;left:0px;width:300px; float: left;}
			#columna-4 { display: inline;width:300px; position: relative; float: right;}

		
			img{
			width: 1000px ;
		}
			#banner3{shape-outside: circle(80%); float: right; width: 220px; height: 180px;border-radius: 50px; position:relative; right: 30px;}


		.bgcolor {
			background-color: black;
			color: #FFFFFF;

		}

		.tdstyle {
			font-weight: bold;
			font-size: 12px;
			height: 20px;
			line-height: 20px;
		}

		.bgcard {
			background-color: black;
		}
		a{
			text-decoration: none;
			color: rgb(18, 48, 18);
		}

	.row{font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:28px; color:#000000;  width: 12.5%; 
	
		}		
	.g-4{
	line-height:2px;
	position: relative;
	top: 0;
	padding-top: 4px;
	margin-top: 0;
	}	

	.td4{

		margin: 0;
		padding: 0;
		position: relative;
		top: 0;
	}	

	</style>
</head>

<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#353535; -webkit-text-size-adjust:none;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
		<tr>
			<td align="center" valign="top">
				<table width="700" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
					<tr>
						<td class="td container"
							style="width:700px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:0px 0px 0px 0px;">

							<!-- BANNER 1 -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="p30-15"
													style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr style=" width:700px">
															<img src="https://maritur.com/__img/uploads/banner1.png" style="width:700px" border="0" alt="Img no Available" />  
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!-- END BANNER 1 -->

							<!-- MSG-->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="p30-15" style="padding: 15px 0px 0px 0px;" bgcolor="#ffffff">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:28px; color:#000000; padding-top:50px; padding-left:50px; padding-right:50px;padding-bottom:15px; width: 100%;">
													<h4>Dear '.$customername.'<br>Greetings from Banyan Tree Mayakoba! <br><br> We are pleased to confirm your private Cancun Airport/Hotel transportation as follow:<br> <br></h4>
												</td>
											</tr>
											
										</table>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											
											<tr>
												
												<td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:2px; color:#000000;  width: 25%; padding-left: 50px;" >
													<h4 id="columna-1">ARRIVAL</h4>
												</td>
                                                <td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:2px; color:#000000;  width: 25%;  padding-right:50px;"> 
                                                    <h4 id="columna-2">DEPARTURE</h4>
												</td>
												
												
											</tr>
											
											</table>
											<table width="100%">
												<tr>
													<td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:28px; color:#000000;  width: 25%; padding-left:50px; padding-right:50px;" >
														<hr>
													</td>
												</tr>
											</table>
											<table width="100%" border="0" style="padding-bottom: 0px;" cellspacing="0" cellpadding="0">
												<td style="padding-left: 50px; width: 30%; padding-bottom: 0px;">
													<table>
														<td>
															<tr><h4 class="g-4">DATE:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">FLIGHT:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">FLIGHT TIME:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">PASSENGERS:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">CONFIRMATION NUMBER:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">VEHICLE:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">CHARGE:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">SPECIAL REQUERIMENTS:</h4></tr>
														</td>
													
													</table>
												</td>
												<td style=" width: 20%; padding-bottom: 0px;">
													<table>                
														<td>
															<tr><h4 class="g-4">'.$fecha_arrival.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$vuelo_arrival.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$tiempo_arrival.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$pasajeros_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$id_arrival.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$vehiculo_arrival.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$precio_arrival.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">Wheel Chair</h4></tr>
														</td>
													</table>
												</td>
												<td style="width: 25%; padding-bottom: 0px;">
													<table>
														<td>
															<tr><h4 class="g-4">DATE:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">FLIGHT:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">FLIGHT DEPARTURE TIME:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">DEPARTURE FROM HOTEL:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">PASSENGERS:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">CONFIRMATION NUMBER:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">VEHICLE:</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">CHARGE:</h4></tr>
														</td>
														
													</table>
												</td>
												<td style="padding-right: 30px; padding-bottom: 0px;" >
													<table>
														<td>
															<tr><h4 class="g-4">'.$fecha_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$vuelo_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$tiempo_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$tiempo_fromhotel_departure.' departure from hotel</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$pasajeros_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$id_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$vehiculo_departure.'</h4></tr>
														</td>
														<td>
															<tr><h4 class="g-4">'.$precio_departure.'</h4></tr>
														</td>
													</table>
												</td>
											</table>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:2px; color:#000000; padding-bottom:15px; width: 25%; padding-left:50px; padding-right:50px;"><hr>
														<h4>ARRIVAL INSTRUCTIONS:<br><br>Once you arrive into the Cancun Airport, you will see Mexican Inmigration and then proceed to the luggage carousel, secure your bags and head for the Customs official. Having completed this exercise, walk through the hallway all te way to the Private Transportation Exit (Not the Friends & Family exit) </h4>
													</td>
												</tr>
											</table>

							<!-- BANNER 2 -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="p30-15"
													style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr style="width: 100%;">
															<img src="https://maritur.com/__img/uploads/banner2.png"style="width:700px"border="0" alt="Img no Available" />  
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!-- END BANNER 2 -->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<!--PAGE 2-->
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
		<tr>
			<td align="center" valign="top">
				<table width="700" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
					<tr>
						<td class="td container"
							style="width:700px; min-width:650px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:0px 0px 0px 0px;">
						
							<!-- MSG PG 2 -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="p30-15" style="padding: 15px 0px 0px 0px" bgcolor="#ffffff">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:28px; color:#000000; padding-left:40px; padding-right:20px;padding-bottom:0px;padding-top:50px;width: 100%; ">									
													<h4 id="text-a">
														How would you identify our Maritur staff? They will be wearing a red polo shirt and beige pants, holding<br>
    													a sign that says “Banyan Tree Mayakoba”. To protect your privacy, no name will not be displayed.<br><br>
														
														After locating our Maritur Staff, you will be escorted to your scheduled<br>
														<img src="https://maritur.com/__img/uploads/banner3.png" id="banner3">
    													means of transportation and transferred to your hotel.<br><br>
    													
    													You will notice many people offering you transportation services,<br>
    													please do not stop to discuss or talk about your transportation<br>
    													with anyone before leaving the building  (be careful, most of<br>
    													them are time shared employees or non-authorized transpor-<br>
    													tation companies).<br><br>
    													Our staff continually monitors your flight status and knows your<br>
    													accurate arrival time, they will be looking for you. If for any<br>
    													reason you can&apos;t locate our representative, you can call the<br>
    													number below for further assistance:<br><br>
    													Changes on your itinerary? +52 984 877 36 88 ext. 7427<br><br><br>
    													If you have any right changes, please send us an email to banyantree@maritur.com. Traveling with pets
    													will apply a $25 USD (One way) per service if there is a pick up need to be done in a different terminal this
    													will apply a $ 25 USD per stop.<br><br>
    													Cancellation & Waiting Time Policies:<br>
    													Full refund if cancellation is made before 6 hrs prior to the service, No refund if cancellation is made
    													within less than 6 hours prior to the service. Transportation will wait up to 15 minutes past schedule
    													departure time before extra charge is applicable. Have a pleasant journey to the Mexican Caribbean.
													</h4>
												</td>	
											</tr>
											<tr>
												<td style="font-family:Roboto, Arial,sans-serif; font-size:12px; line-height:28px; color:#000000; padding-left:50px; padding-right:0px;padding-bottom:15px;padding-top:-50px;width: 100%; ">
													<h4>
														OUR CLIENTS:<br>
														<ul style="padding: 0;">
															<li style="list-style-position: inside; padding: 0;">Customers are not greeted by the hand, instead a “Welcome Gesture” has been established.</li>
															<li style="list-style-position: inside;">Amenities may vary as part of your transportation service.</li>
														</ul>
													</h4>
														  <!--QR-->
													<h4 id="columna-3"><a href="https://play.google.com/store/apps/details?id=com.banyantreeconnect.banyantreeconnect.android">Download Banyan Tree Mayakoba App </a></h4>
														  <!--Social media-->
													<h4 id="columna-4">
														<a href="https://www.facebook.com/BanyanTree.Mayakoba" style="text-align:center;">Facebook</a>
														<a href="https://www.instagram.com/banyantreemayakoba/" style="text-align:center;">Instagram</a>
														<a href="https://mx.linkedin.com/" style="text-align:center;">Linkedin</a>
														<a href="https://www.youtube.com/" style="text-align:center;">Youtube</a>
														<br><h4 style="padding-left: 60%;">BAYANTREEMAYAKOBA</h4>
													</h4>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!--END MSG PG 2-->

							<!-- BANNER 4 -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="p30-15"
													style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr style=" width:1000px">
															<img src="https://maritur.com/__img/uploads/banner4.png" style="width:700px"border="0" alt="Img no Available" />  
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!-- END BANNER 4d -->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>				
</body>
</html>';
        
        //##########################################
        //###########FIN -------------MENSAJE QUE SE ENVIARÁ AL CORREO
        //#########################################

        //$mensaje_html = wordwrap($mensaje_html, 70, "\r\n");

    ?>
    <div>
        <div>
            <p class="mensaje">Se ha generado la carta del ID <? echo "<b>".$_SESSION['CARD_ID']."</b>" ?></p>
        </div>
        <div class="p50 mensaje">
            <div align="center">
                <a href="carta_mensaje_banyan.html" target="_blank" class="mensaje">Ver Carta Confirmación</a>
                <!--<a href="carta_mensaje.html" target="_blank" class="mensaje">Ver Carta Confirmación</a>-->
            </div>
        </div>
    
        <div class="p50 mensaje">
            <div align="center" style="padding-top: 20px;">
                <a href="/lettering_banyan_v2.php" class="mensaje">REGRESAR</a>
            </div>
        </div>
        
        <div class="mensaje">
            <div align="center" style="padding-top: 20px;">
                <p>Se enviara la carta a la direccion: <? echo "<b>".$_SESSION['MAIL_CLIENT']."</b>"?></p>
                <?php 
                if($_SESSION['SECOND_MAIL']){
                    echo "<p>CC: <b>".$_SESSION['SECOND_MAIL']."</b></p>";
                }
                ?>
            </div>
        </div>
        <div id="msj" align="center" style="padding-top: 20px;">
            <button onclick="clickMe()">Enviar Carta</button>
        </div>
        
        <!--INICIO esto estará provicionalmente-->
        <?php
        /*echo nl2br("imprimiendo variables\n");
        echo '$_POST[\'idioma\'] = '. $_POST['idioma']. nl2br("\n");
        echo '$_POST[\'logo\'] = '. $_POST['logo']. nl2br("\n");
        echo '$row_transporta[\'customername\'] = '. $row_transporta['customername']. nl2br("\n");
        echo '$row_transporta[\'arrivaldate\'] = '. $row_transporta['arrivaldate']. nl2br("\n");
        echo "fecha = ".date_format($arrivaldate,"M jS, Y"). nl2br("\n");
        echo "numero de vuelo = ". $row_transporta['aflightnumber']. nl2br("\n");
        echo 'hora = '. date("H:i", $arrivaltime). 'hrs' . nl2br("\n");
        echo 'numero de pasaheros = '. $row_transporta['numberofadult'].".".$row_transporta['numberofchild']. nl2br("\n");
        echo 'id = '. $row_transporta['id']. nl2br("\n");
        echo 'nombre del hotel = '. $row_transporta['hotelname']. nl2br("\n");
        echo 'precio arrival = '.$_POST['pricea']. nl2br("\n");
        echo 'firma = '.  $_SESSION['MM_nombre'];*/
        ?>
        
        <!--FIN esto estará provicionalmente-->
        
        <?php
            function php_func(){
                echo "Enviando correo ...";
            }
        ?>
        
        <?php
            function mostrar(){
                echo $mensaje_html;
            }
        ?>
    </div>
    
<?php
    //aqui se guardará el html para poder previsualizarlo antes de enviar
	$file = fopen("carta_mensaje_banyan.html","w");
	fwrite($file,$mensaje_html);
	fclose($file);
?>
    
    
<script>
    var msj = document.getElementById('msj');
    function clickMe(){
        var result ="<?php php_func(); ?>"
        msj.innerHTML = result;
        location.href ="https://srv.maritur.com/sendletterv2.php";
    }
    
</script>
</body>
</html>