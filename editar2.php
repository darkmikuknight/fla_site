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
 global $enviou;
 $enviou = false;



if(isset($_GET['go'])==false){
  $query = "SELECT * FROM djs WHERE id_dj ='$id'";
  $result = pg_query($query);

   //echo '<td> "ID0="'. $id.'</td>';
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Editor de cadastro</title>

  <!-- Bootstrap core CSS -->
  <link href="login/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<style>
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
            <a class="nav-link" href="ola.php">Editor de DJ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login/gerenciador.php">Voltar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login/sair.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  
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
  echo  '<div class="element-phone"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="15" name="telefone" id="telefone" required="required"  placeholder="Telefone/Whatsapp" value="'. $telefone.'" /><span class="icon-place"></span></div></div>';
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
          <input type="file" name="myfile" id="myfile" onchange="uploadFile()">
          <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
          <h4 id="status"></h4>
          <p id="loaded_n_total"></p>
          <!--<input id="upBtn" type="submit" name="submit" value="Upload File Now" >
          --> </div>';


  echo '<div class="submit"><input type="submit" value="Salvar"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">javascript form validation</a> Formoid.com 2.9</p><script type="text/javascript" src="formoid2_files/formoid1/formoid-solid-blue.js"></script>';
  echo '<!-- Stop Formoid form-->';

      }

  }

  if($exibe_texto && (isset($_GET['go'])== false)){
      //echo '<p>&nbsp;</p>';
      echo '<h2 align="center">Imagem do DJ</h2>';
      echo '<div id="img2" align="center"><img  id="img2" src="img_djs/'.$img_nome.'"></div>';
    
      echo '<h2 id="text_img">Imagem do DJ</h2>';
      echo '<div id="img_pequena"><img id="img_pequena" src="img_djs/'.$img_nome.'"></div>';  
  }

?>

  <!-- Bootstrap core JavaScript -->
  <script src="login/vendor/jquery/jquery.slim.min.js"></script>
  <script src="login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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

    
    // pegando os dados da imagem para verificacoes //
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
            echo "O arquivo não é uma imagem. ";
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
        echo "Desculpe, o arquivo é muito grande. ";
        $uploadOk = 0;
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

        echo "<script>alert('Apenas JPG, JPEG, PNG são permitidos!'); history.back();</script>";
        echo "Desculpe, apenas JPG, JPEG, PNG & GIF são permitidos. ";
        $uploadOk = 0;
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=Formoid22.php">';
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado. ";
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

        // checa para ver se a imagem foi enviada com sucesso
        if ("<script>document.writeln(checaEnvio());</script>") { //move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)
            
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
