<?php 
$ToEmail = 'mohammadrafii480@gmail.com'; 
$EmailSubject = 'Kontak Kami Dari Jaskut'; 
$mailheader = "From: ".$_POST["email"]."\r\n";; 

$MESSAGE_BODY = "Nama    : ".$_POST["name"]."\n\n";
$MESSAGE_BODY = "Email   : ".$_POST["email"]."\n\n"; 
$MESSAGE_BODY = "Subject : ".$_POST["subject"]."\n\n"; 
$MESSAGE_BODY = "Pesan   : ".$_POST["message"]."\n\n";  

mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

header('location: kontak_kami.php'); 

?>