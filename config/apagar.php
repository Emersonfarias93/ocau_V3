<?php

include ("conn.php");

$id = $_POST['id'];


if ($id){

  $query = "DELETE FROM tb_email WHERE id = $id";
  $mysqli->query($query);
  $mysqli->close();

}

header("Location: /ocau_V3/views/lista_email.php")

?>
