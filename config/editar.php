<?php

// CONECTANDO COM O BANCO DE DADOS
$dbname = "ocau"; // nome do banco de dados
$dbhost = "localhost"; // local onde está o banco de dados
$dbuser = "root"; // nome do usuário do bando de dados
$dbpass = ""; // senha do usuário do bando de dados

$pdo = new PDO("mysql:dbname=" . $dbname . ";host:" . $dbhost . "", "" . $dbuser . "", $dbpass);

// ........
$lista_emails = [];
$id = filter_input(INPUT_GET, 'id');

// .......

if ($id) {

  $sql = $pdo->prepare("SELECT * FROM tb_email WHERE id = :id");
  $sql->bindValue(':id', $id);
  $sql->execute();

  if ($sql->rowCount() > 0) {
    $lista_emails = $sql->fetch(PDO::FETCH_ASSOC);
  } else {
    header("Location: index_email.php");
    exit;
  }
} else {
  header("Location: index_email.php");
  exit;
}
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
<?php include("../views/header-admin.html"); ?>
<br><br>
  <main class="container mt-5">
    <a href="/ocau_V2/views/lista_email.php" class="btn btn-info mb-3"> Voltar </a>
    <div class="bg-light p-5 rounded">
      <h1>Editar Usuário</h1>
      <form action="back_editar.php" method="POST">
      <!-- ID importante -->
      <input type="hidden" name="id" value="<?php echo $lista_emails['id'];?>" /> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Digite Seu Email</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $lista_emails['email']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
  </main>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous">
    </script>
  </body>

</html>