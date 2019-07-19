<?php session_start();

include "db_postConfig.php";
 //require_once "config.php";


 //require_once "config.php";


//https://www.youtube.com/watch?v=rHPWkoXFIKM


if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}


 global $id;
 $id = intval($_GET['id']);
 global $exibe_texto;
 $exibe_texto = true;


if(isset($_GET['go'])==false){
  $query = "SELECT * FROM djs WHERE id_dj ='$id'";
  $result = pg_query($query);

   //echo '<td> "ID0="'. $id.'</td>';
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Editar DJ</title>
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

#text_img{
  position: relative;
  top: -1000px !important;
  left: 130px !important;
}

#img_pequena{
  position: relative;
  max-width: 430px;
  height: auto;
  top: -500px;
}

#img2{
  float: center;
  max-width: 100%;
  height: auto;
}

#formE{
  
}


</style>
	
	
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">

<ul>
  <li><a class="active" href="#">Editor de DJ</a></li>
  <li><a  href="login/gerenciador.php">Voltar</a></li>
  <li style="float:right"><a href="login/sair.php">Sair</a></li>
  
</ul>

<?php

if(isset($_GET['go'])==false){
while ($row = pg_fetch_row($result)) 
    {
      echo '<tr>';
      $count = count($row);
      $y = 0;
      while ($y < $count)
      {
        $c_row = current($row);
        //echo '<td>' . $c_row . '</td>';
              
        next($row);
        $y = $y + 1;
      }
    
    
   $nome_real = pg_fetch_result($result, $i, "nome_real"); 
   $nome_art = pg_fetch_result($result, $i, "nome_art"); 
   $telefone = pg_fetch_result($result, $i, "telefone"); 
   $telefone2 = pg_fetch_result($result, $i, "telefone2"); 
   $cidade = pg_fetch_result($result, $i, "cidade"); 
   $estado = pg_fetch_result($result, $i, "estado"); 
   $descricao = pg_fetch_result($result, $i, "descricao"); 
   $img_nome = pg_fetch_result($result, $i, "img_nome"); 
   $email = pg_fetch_result($result, $i, "email"); 
   $website = pg_fetch_result($result, $i, "website"); 
   //$img_src = 
   //$id = $_GET['id'];
  //echo '<td> "IDNOME="'.$nome_real.'</td>';
   
?>

<script type="text/javascript" src="../alertifyjs/alertify.js"></script>
<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.css">
<!-- Start Formoid form-->
<link rel="stylesheet" href="formoid2_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid2_files/formoid1/jquery.min.js"></script>
<form id="formE" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"  action="?go=salvar"  enctype="multipart/form-data" ><div class="title"><h2>Editor de DJ</h2></div>



<?php  //apos fazer a leitura do banco e salvar nas variaveis, aplica-se no formulario com os respectivos valores

echo  '<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="nome_real" required="required" value="'. $nome_real.'" placeholder="Nome real"/><span class="icon-place"></span></div></div>';
echo  '<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="nome_art" required="required" value="'. $nome_art.'" placeholder="Nome artistico"/><span class="icon-place"></span></div></div>';
echo  '<div class="element-phone"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefone" required="required"  placeholder="Telefone/Whatsapp" value="'. $telefone.'" /><span class="icon-place"></span></div></div>';
echo  '<div class="element-phone"><label class="title"></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefone2"';
  if ($telefone2 == null)
    {echo 'placeholder="Outro Telefone (opcional)" />';}
  else
    {echo 'value="'.$telefone2.'" />';}
echo '<span class="icon-place"></span></div></div>';

echo  '<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="cidade" required="required"'; 
  if ($cidade == null)
      {echo 'placeholder="Cidade" />';}
  else
      {echo 'value="'.$cidade.'" />';}
echo '<span class="icon-place"></span></div></div>';

echo  '<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="estado" required="required"';
  if ($estado == null)
      {echo 'placeholder="Estado" />';}
  else
      {echo 'value="'.$estado.'" />';}
echo '<span class="icon-place"></span></div></div>';

echo '<div class="element-email"><label class="title"></label><div class="item-cont"><input class="large" type="email" name="email"';
    if($email == null)
        {echo 'placeholder="Email"/>';}
    else
        {echo 'value="'.$email.'" />';}
echo '<span class="icon-place"></span></div></div>';

echo '<div class="element-url"><label class="title"></label><div class="item-cont"><input class="large" type="url" name="website"';
    if($website == null)
        {echo 'placeholder="Website"/>';}
    else
        {echo 'value="'.$website.'" />';}
echo '<span class="icon-place"></span></div></div>';

echo  '<div class="element-textarea"><label class="title"></label><div class="item-cont"><textarea class="medium" name="descricao" cols="20" rows="5"';
  if ($descricao == null)
      {echo 'placeholder="Descriçao (opcional)"/></textarea>';}
  else
      {echo '/>'.$descricao.'</textarea>';}
echo '<span class="icon-place"></span></div></div>';

echo '<input type="hidden" id="id" name="id" value='.$id.'>';

echo '<div id="up">
        Upload a File:
        <input type="file" name="myfile" id="fileToUpload">
        <!--<input id="upBtn" type="submit" name="submit" value="Upload File Now" >
        --> </div>';


echo '<div class="submit"><input type="submit" value="Salvar"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">javascript form validation</a> Formoid.com 2.9</p><script type="text/javascript" src="formoid2_files/formoid1/formoid-solid-blue.js"></script>';
echo '<!-- Stop Formoid form-->';

    }

}

if($exibe_texto){
    //echo '<p>&nbsp;</p>';
    echo '<h2 align="center">Imagem do DJ</h2>';
    echo '<div id="img2" align="center"><img  id="img2" src="img_djs/'.$img_nome.'"></div>';
  
    echo '<h2 id="text_img">Imagem do DJ</h2>';
    echo '<div id="img_pequena"><img id="img_pequena" src="img_djs/'.$img_nome.'"></div>';
   
}

?>


</body>
</html>


<?php
if(@$_GET['go'] == 'salvar') // && @$_GET['upload'] == 'enviar')
{
	$nome_real_2 = $_POST['nome_real'];
	$nome_art_2 = $_POST['nome_art'];
	$telefone_2 = $_POST['telefone'];
	$telefone2_2 = $_POST['telefone2'];
	$cidade_2 = $_POST['cidade'];
	$estado_2 = $_POST['estado'];
	$descricao_2 = $_POST['descricao'];
    $id_2 = $_POST['id'];
    $email_2 = $_POST['email'];
    $website_2 = $_POST['website'];
	
	
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
        echo "<script>alert('Imagen não foi enviada!'); history.back();</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=editar2.php?id='.$id_2.'">';
    // if everything is ok, try to upload file
    }
	
	//echo '<td>' .$nome_completo. '</td>'; // nome da imagem, APENAS para testes
		
	 // verificando se algum campo está em branco
		
		if(empty($nome_real_2)){
			echo "<script>alert('Preencha o campo 'Nome real'!.'); history.back();</script>";
		}elseif(empty($nome_art_2)){
			echo "<script>alert('Preencha o campo 'Nome artístico'!.'); history.back();</script>";
		}elseif(empty($telefone_2)){
			echo "<script>alert('Preencha o campo 'Telefone/Whatsapp'!.'); history.back();</script>";
		}
		
		
		else{
			//$query2=();
			//pg_query($query2);

      if ($uploadOk == 1){ 

        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
            
            $exibe_texto=false;
          //echo " The file ". basename( $_FILES["myfile"]["name"]). " has been uploaded."; //exibe o nome do da imagem caso o upload ocorreu com sucesso.
          echo '<div id="img" align="center"><p><h2>Aguarde, você será redirecionado...<h2><p></div>';
          $result = pg_query("UPDATE djs SET  (nome_real, nome_art, telefone, telefone2, cidade, estado, descricao, img_nome, email, website) = ('$nome_real_2', '$nome_art_2', '$telefone_2', '$telefone2_2', '$cidade_2', '$estado_2', '$descricao_2', '$nome_completo', '$email_2', '$website_2') WHERE id_dj ='$id_2' "); 
          echo "<script>alert('Usuario atualizado com sucesso!');</script>";
          echo '<script language = "JavaScript" >
                    alertify.success("Usuario cadastrado com sucesso!");
                </script>';
                
         echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login/gerenciador.php">';
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
