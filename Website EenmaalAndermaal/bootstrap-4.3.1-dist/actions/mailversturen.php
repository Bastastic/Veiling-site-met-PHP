<?php


if ( isset( $_POST['emailadres'] ) ){ 

    $mail = $_POST['emailadres'];
    $subject = "BASSIIEE";
    $txt = "ADRIAAN!";

    mail($mail,$subject,$txt);

}

?> 