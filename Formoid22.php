<?php session_start();

include "db_postConfig.php";
 //require_once "config.php";


 

//https://www.youtube.com/watch?v=rHPWkoXFIKM

if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}
//echo("Enter my lord!");
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Cadastro de DJs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
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

#up{
  text-align: left;
   font-family: verdana;
  font-size: 15px;
}



</style>
	
	
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">

<ul>
  <li><a href="login/ola.php">Home</a></li>
  <li><a class="active" href="../Formoid22.php">Cadastro de DJs</a></li>
  <li><a  href="login/gerenciador.php">Gerenciar DJs</a></li>
  <li style="float:right"><a href="sair.php">Sair</a></li>
  
</ul>


 <script type="text/javascript" src="../alertifyjs/alertify.js"></script>
<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.css">
<!-- Start Formoid form-->
<link rel="stylesheet" href="formoid2_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid2_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"  action="?go=cadastrar"  enctype="multipart/form-data" ><div class="title"><h2>Cadastro de DJs</h2></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="nome_real" required="required" placeholder="Nome real"/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="nome_art" required="required" placeholder="Nome artistico"/><span class="icon-place"></span></div></div>
	<div class="element-phone"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefone" required="required" placeholder="Telefone/Whatsapp" value=""/><span class="icon-place"></span></div></div>
	<div class="element-phone"><label class="title"></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefone2" placeholder="Outro Telefone (opcional)" value=""/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="cidade" placeholder="Cidade"/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="estado" placeholder="Estado"/><span class="icon-place"></span></div></div>
	<div class="element-textarea"><label class="title"></label><div class="item-cont"><textarea class="medium" name="descricao" cols="20" rows="5" placeholder="Descriçao (opcional)"></textarea><span class="icon-place"></span></div></div>
	<div id="up">
        Upload a File:
        <input type="file" name="myfile" id="fileToUpload">
        <!--<input id="upBtn" type="submit" name="submit" value="Upload File Now" >
        --> </div>
   
    

    <div class="submit"><input type="submit" name="submit" value="Cadastrar"/></form>
    <p class="frmd"><a href="http://formoid.com/v29.php">javascript form validation</a> Formoid.com 2.9</p><script type="text/javascript" src="formoid2_files/formoid1/formoid-solid-blue.js"></script>
    <!-- Stop Formoid form-->

<p>&nbsp;</p>




</body>
</html>


<?php
if(@$_GET['go'] == 'cadastrar') // && @$_GET['upload'] == 'enviar')
{
	$nome_real = $_POST['nome_real'];
	$nome_art = $_POST['nome_art'];
	$telefone = $_POST['telefone'];
	$telefone2 = $_POST['telefone2'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$descricao = $_POST['descricao'];
	
	
	$data = date('Y-m-d');
	
	
	date_default_timezone_set('America/Sao_Paulo'); 

    //ALTER TABLE djs ADD COLUMN img_nome varchar(80);

    $target_dir = "img_djs/";
    $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
    $filename = pathinfo($_FILES['myfile']['name'], PATHINFO_FILENAME);
    //$type = exif_imagetype($_FILES['myfile']['tmp_name']);
    $nome_completo = basename( $_FILES["myfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
   // if(@$_GET['upload'] == 'enviar') {
        $check = getimagesize($_FILES["myfile"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
   // }
	
        // Check if file already exists
    /*if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }*/
    // Check file size
    if ($_FILES["myfile"]["size"] > 500000) {

        echo "<script>alert('Tamanho da imagem muito grande!'); history.back();</script>";
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

        echo "<script>alert('Apenas JPG, JPEG, PNG são permitidos!'); history.back();</script>";
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        echo '<script language = "JavaScript" >
                alertify.error("Imagen não foi enviada!");
                </script>';
        echo "<script>alert('Imagen não foi enviada!'); history.back();</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    // if everything is ok, try to upload file
    }
	
	echo '<td>' .$nome_completo. '</td>';
		
	 // verificando se algum campo está em branco
		
		if(empty($nome_real)){
			echo "<script>alert('Preencha o campo 'Nome real'!.'); history.back();</script>";
		}elseif(empty($nome_art)){
			echo "<script>alert('Preencha o campo 'Nome artístico'!.'); history.back();</script>";
		}elseif(empty($telefone)){
			echo "<script>alert('Preencha o campo 'Telefone/Whatsapp'!.'); history.back();</script>";
		}
		
		
		else{
			//$query2=();
			//pg_query($query2);

      if ($uploadOk == 1){ 

        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {

          echo " The file ". basename( $_FILES["myfile"]["name"]). " has been uploaded.";
          $result = pg_query("insert into djs (nome_real, nome_art, telefone, telefone2, cidade, estado, descricao, img_nome) values ('$nome_real', '$nome_art', '$telefone', '$telefone2', '$cidade', '$estado', '$descricao', '$nome_completo')"); 
          
          echo "<script>alert('Usuario cadastrado com sucesso!');</script>";
          echo '<script language = "JavaScript" >
                alertify.success("Usuario cadastrado com sucesso!");
                </script>';
                
          echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';

          //$result2 = pg_query("UPDATE djs SET img_nome = '$nome_completo '  WHERE id_dj ='20'"); 
        }
        else {
          echo "Houve algum problema ao enviar a imagem, tente novamente.";
        }
      }
    }

			/*$result = pg_query("insert into djs (nome_real, nome_art, telefone, telefone2, cidade, estado, descricao, img_nome) values ('$nome_real', '$nome_art', '$telefone', '$telefone2', '$cidade', '$estado', '$descricao', '$nome_completo')"); 
			if($result){
			echo "<script>alert('Usuario cadastrado com sucesso!');</script>"; // por algum motivo alert não está funcionando
			//header("Location: Formoid22.php");
			}
			//echo "<meta http-equiv='refresh' content='0, url=./'>";*/
}
            
  
?>
