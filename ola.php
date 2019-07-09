<?php //https://www.youtube.com/watch?v=rHPWkoXFIKM
session_start();
if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}
//echo("Enter my lord!");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tela de gerenciamento de DJs</title>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

body{
    background: linear-gradient(110deg, #fdcd3b 60%, #ffed4b 60%);
}

</style>
</head>
<body>

<ul>
  <li><a class="active" href="ola.php">Home</a></li>
  <li><a href="../Formoid22.php">Cadastro de DJs</a></li>
  <li><a href="gerenciador.php">Gerenciar DJs</a></li>
  <li style="float:right"><a href="sair.php">Sair</a></li>
 
</ul>

<!--
 <img align="right" src="turntable-310450_1280.png" alt="" style="width:500px; height500px;">
-->

</body>
</html>
