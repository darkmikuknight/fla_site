<?php //https://www.youtube.com/watch?v=rHPWkoXFIKM
session_start();
if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}
//echo("Enter my lord!");
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Área de Gerenciamento TOPDJ$</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="blurBg-false" style="background-color:#EBEBEB">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="https://topdjsapp.com/">Acessar TOPDJ$APP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="ola.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Formoid22.php">Cadastro de DJs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gerenciador.php">Gerenciar DJs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gerenciador2.php">Gerenciar2 DJs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sair.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5"></br></br>Área de gerenciamento de DJs</h1>
        <p class="lead">Escolha alguma opção acima.</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
