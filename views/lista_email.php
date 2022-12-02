<?php
include("../config/protect.php");
include ("../config/conn.php");
  
$sql = "SELECT * FROM tb_email";
$sql_query =  $mysqli->query($sql);

$lista = $sql_query->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>O Canvas de Usabilidade!</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <?php include("header-admin.html"); ?>
  <p>
    <h2> Bem vindo ao Painel administrativo! <?php echo $_SESSION['nome']; ?></h2>
</p>
  <main class="container mt-5">
    <div class="bg-light p-5 rounded">
      <h1>Emails Cadastrado na Newsletter</h1>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Email</th>
    </tr>
  </thead >
  <tbody>
  <?php foreach($lista as $lista_emails): ?>
    <tr>
      <th scope="row"><?php echo $lista_emails['id']; ?></th>
      <td><?php echo $lista_emails['email'];?></td>
      <td>
            <a href="/ocau_V3/config/editar.php?id=<?php echo $lista_emails['id']; ?>" name="id" class="btn btn-secondary"> Editar </a>            
        </td>
        <td><a href="/ocau_V3/config/apagar.php?id=<?php echo $lista_emails['id']; ?>" name="email" class="btn btn-danger"> Apagar </a></td>
    </tr>
  <?php endforeach; ?> 
  </tbody>
  </main>
</body>
</html>