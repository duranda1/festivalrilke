<?php
$to = "artawende@gmail.com";
$from= $_POST['nom'].' '.$_POST['prenom'].' '.$_POST['email'];
$subject ="Reservations billets";
$message = "Reservation";
$nb = $_POST['nb'];
mail($to, $subject, $message, $from, $nb);
//Header("Location:./confirmReservations.php");
?>
