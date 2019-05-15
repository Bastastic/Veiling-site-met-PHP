<?php


if ( isset( $_POST['emailadres'] ) ){ 
$mail = $_POST['emailadres']
$to = $mail;
$subject = "BASSIIEE";
$txt = "ADRIAAN!";

mail($to,$subject,$txt);

}

?> 