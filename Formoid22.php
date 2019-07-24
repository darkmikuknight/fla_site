<?php session_start();

include "db_postConfig.php";
 //require_once "config.php";

//comunica@verointernet.com.br



if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
//https://www.youtube.com/watch?v=rHPWkoXFIKM
}
//echo("Enter my lord!");



global $enviou;
 $enviou = false;



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

<script> //usado para a barra de progresso//
function _(el) {
  return document.getElementById(el);
}


var enviada = true;

function uploadFile() {
  var file = _("myfile").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("myfile", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "upload2.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% enviado... aguarde";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}


function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
    <?php
    $enviou = false;
    ?>
    enviada = false;
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
  <?php
    $enviou = false;
    ?>
    
    enviada = false;
}

function checaEnvio(){
    return enviada;
}


// mascaras ER //
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}

</script>


<ul>
  <li><a href="login/ola.php">Home</a></li>
  <li><a class="active" href="Formoid22.php#">Cadastro de DJs</a></li>
  <li><a  href="login/gerenciador.php">Gerenciar DJs</a></li>
  <li style="float:right"><a href="login/sair.php">Sair</a></li>
  
</ul>


 <script type="text/javascript" src="../alertifyjs/alertify.js"></script>
<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.css">
<!-- Start Formoid form-->
<link rel="stylesheet" href="formoid2_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid2_files/formoid1/jquery.min.js"></script>
<form id="form_texto" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"  action="?go=cadastrar" enctype="multipart/form-data" ><div class="title"><h2>Cadastro de DJs</h2></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="nome_real" required="required" placeholder="Nome real"/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="nome_art" required="required" placeholder="Nome artistico"/><span class="icon-place"></span></div></div>
	<div class="element-phone"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" name="telefone"  id="telefone" maxlength="15" required="required" placeholder="Telefone/Whatsapp" value=""/><span class="icon-place"></span></div></div>
	<div class="element-phone"><label class="title"></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="telefone2" placeholder="Outro Telefone (opcional)" value=""/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="cidade" required="required" placeholder="Cidade"/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="estado" required="required" placeholder="Estado"/><span class="icon-place"></span></div></div>
	<div class="element-email"><label class="title"></label><div class="item-cont"><input class="large" type="email" name="email" value="" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="element-url"><label class="title"></label><div class="item-cont"><input class="large" type="url" name="website"  placeholder="Website"/><span class="icon-place"></span></div></div>	
	<div class="element-textarea"><label class="title"></label><div class="item-cont"><textarea class="medium" name="descricao" cols="20" rows="5" placeholder="Descriçao (opcional)"></textarea><span class="icon-place"></span></div></div>
	<div id="up">
        Fazer upload:
        <input type="file" name="myfile" id="myfile" onchange="uploadFile()">
        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
        <h3 id="status"></h3>
        <p id="loaded_n_total"></p>
        <!--<input id="upBtn" type="submit" name="submit" value="Upload File Now" >
        --> </div>
   
    <div class="submit"><input type="submit" name="submit" value="Cadastrar"  /></form>
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
	$email = $_POST['email'];
	$website = $_POST['website'];
	
	
	$data = date('Y-m-d');
	
	
	date_default_timezone_set('America/Sao_Paulo'); 

    //ALTER TABLE djs ADD COLUMN img_nome varchar(80);


    $target_dir = "img_djs/";
    $filename = $_FILES["myfile"]["name"]; // The file name
    $target_file = $target_dir . $_FILES["myfile"]["name"];
    $type = $_FILES["myfile"]["type"];

    /*$target_dir = "img_djs/";
    $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
    $filename = pathinfo($_FILES['myfile']['name'], PATHINFO_FILENAME);
    //$type = exif_imagetype($_FILES['myfile']['tmp_name']);
    */

    //echo '<script type="text/javascript">uploadFile()</script>';
    
    
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
            echo " O arquivo não é uma imagem.";
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
        echo " Desculpe, o arquivo é muito grande.";
        $uploadOk = 0;
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

        echo "<script>alert('Apenas JPG, JPEG, PNG são permitidos!'); history.back();</script>";
        echo "Desculpe, apenas JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo " Desculpe, seu arquivo não foi enviado.";
        echo '<script language = "JavaScript" >
                alertify.error("Imagen não foi enviada!");
                </script>';
        echo "<script>alert('Imagen não foi enviada!'); history.back();</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    // if everything is ok, try to upload file
    }
	
	//echo '<td>' .$nome_completo. '</td>';
		
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

        //echo '<td>' .$enviou. '</td>';
        //echo "<script>document.writeln(checaEnvio());</script>";
          //echo "<script>alert(checaEnvio());</script>";
          
            // checa para ver se a imagem foi enviada com sucesso
            if ("<script>document.writeln(checaEnvio());</script>" ) { // move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file
                
                echo " The file ". basename( $_FILES["myfile"]["name"]). " has been uploaded.";
                $result = pg_query("insert into djs (nome_real, nome_art, telefone, telefone2, cidade, estado, descricao, img_nome, email, website) values ('$nome_real', '$nome_art', '$telefone', '$telefone2', '$cidade', '$estado', '$descricao', '$nome_completo', '$email', '$website')"); 
                
                echo "<script>alert('Usuario cadastrado com sucesso!');</script>";
                echo '<script language = "JavaScript" >
                        alertify.success("Usuario cadastrado com sucesso!");
                        </script>';
                        
                echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';

                //$result2 = pg_query("UPDATE djs SET img_nome = '$nome_completo '  WHERE id_dj ='20'"); 
                }
            else {
                echo "Houve algum problema ao enviar a imagem, tente novamente.";
                echo '<script language = "JavaScript" >
                        alertify.error("Houve algum problema no processo, tente novamente!");
                        </script>';
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
