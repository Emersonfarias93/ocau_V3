<?php
require 'conn.php';

$id = $_POST['id'];
$email = $_POST["email"];


    $query = "UPDATE tb_email SET email = $email WHERE id = $id";

    if ($mysqli->query($query) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " .error;
      }
      
      $mysqli->close();

?>