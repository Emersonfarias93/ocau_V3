<?php 

include_once("conn.php");

$email = $_REQUEST['email'];

if($email != null){		
    $conn->query("INSERT INTO `tb_email`( `email`) VALUES ('$email')");
    header("Location: ../index.php"); 
}
else
{
    header("Location: ../index.php");
}

?>