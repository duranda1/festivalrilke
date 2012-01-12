<?php
$TO = "artawende@gmail.com";

$h = "From: " . $TO;

$message = "reservation";

while (list($key, $val) = each($HTTP_POST_VARS)) {
$message .= "$key : $val\n";
}

mail($TO, $subject, $message, $h);

Header("Location:./confirmReservations.php");

?>