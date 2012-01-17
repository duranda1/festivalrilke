<?php

include("phpqrcode/qrlib.php");

QRcode::png('some othertext 1234'); // creates code image and outputs it directly into browser

$to = "duranda1@students.hevs.ch";
$from= $_POST['nom'].' '.$_POST['prenom'].' '.$_POST['email'];
$subject ="Reservations billets";
$message = "Reservation";
$nb = $_POST['nb'];
ini_set('SMTP', 'mail.hevs.ch');
ini_set('smtp_port', '587');
mail($to, $subject, $message, $from, $nb);
//Header("Location:./confirmReservations.php");
?>
