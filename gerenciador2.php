<?php //https://www.youtube.com/watch?v=rHPWkoXFIKM
session_start(); 
include "../db_postConfig.php";

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

  <title>Gerenciador de DJs</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="../alertifyjs/alertify.js"></script>
  <link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.css">
  
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-1.3.2.min.js"></script>


<!-- daqui mesmo -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<style>
    
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}


#menu_{
margin-left: 59% !important; 

font-size: 16 !important;

}

</style>



</head>

<body class="blurBg-false" style="background-color:#EBEBEB">
<script>
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});

 function deleteUser(id, nome) {

        alertify.confirm("Deseja excluir o "+nome+"?",
        function(){
            alertify.success('Excluído com sucesso!');
            window.location.href= 'excluir.php?id='+id; 
            header("Refresh:2");
        },
        function(){
            alertify.error('Cancelado!');
        });

    }

  function checkDelete(){
      return confirm('Tem certeza?');
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
        <ul id="menu_" class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="ola.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Formoid22.php">Cadastro de DJs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gerenciador.php">Gerenciar DJs</a> 
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="gerenciador2.php">Gerenciar2 DJs</a>
             <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sair.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->




<br><br>
<div class="container">
 <div class="well col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
 
 
 <?php

  $query = 'SELECT * from djs ORDER BY id_dj';

  $result = pg_query($query);
 
  $id=' ';

  $i = 0;
 
    while (pg_fetch_row($result)){ //percorrendo as consulta do banco de dados e salvando nas respesctivas variaveis
      

        $nome_real = pg_fetch_result($result, $i, "nome_real"); 
        $nome_art = pg_fetch_result($result, $i, "nome_art"); 
        $telefone = pg_fetch_result($result, $i, "telefone"); 
        $telefone2 = pg_fetch_result($result, $i, "telefone2"); 
        $cidade = pg_fetch_result($result, $i, "cidade"); 
        $estado = pg_fetch_result($result, $i, "estado"); 
        $descricao = pg_fetch_result($result, $i, "descricao"); 
        $img_nome= pg_fetch_result($result, $i, "img_nome");
        $email= pg_fetch_result($result, $i, "email");
        $website= pg_fetch_result($result, $i, "website");
        $id= pg_fetch_result($result, $i, "id_dj"); 
        
        $telefone_2 = preg_replace('/\D/', '', $telefone);
        
        //$vetorDj[$i] =  array($nome_real, $nome_art, $telefone, $cidade, $estado, $img_nome, $descricao, $email, $website); //armazena as informacoes para serem usadas ao clicar nos portifolios        
        
        //$fieldName = pg_field_name($result, $i);
        
        echo '<div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">';
            
                echo '<img  src="../img_djs/'.$img_nome.'" width="250" height="100" alt="User Pic">';
            echo '</div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                <strong style="line-height: 0px !important;">'.$nome_real.'</strong><br>
            </div>';
           echo '<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".user'.$i.'">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>';
        echo '</div>
        <div class="row user-infos user'.$i.'">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Informações</h3>
                    </div>';
                    echo '<div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                                <img src="../img_djs/'.$img_nome.'" width="130" height="80" alt="User Pic">
                            </div>';
                           echo '<div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50"
                                     alt="User Pic">
                            </div>';
                            echo '<div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                               
                                <dl>
                                    <dt><b>Nome:</b></dt>
                                    <dd>'.$nome_real.'</dd>
                                    <dt><b>Nome Artístico:</b></dt>
                                    <dd>'.$nome_art.'</dd>
                                    <dt><b>Telefone/Whats:</b></dt>
                                    <dd>'.$telefone.'</dd>
                                    <dt><b>Cidade:</b></dt>
                                    <dd>'.$cidade.'</dd>
                                     <dt><b>Estado:</b></dt>
                                    <dd>'.$estado.'</dd>
                                     <dt><b>Descrição:</b></dt>
                                    <dd>'.$descricao.'</dd>
                                     <dt><b>E-mail:</b></dt>
                                    <dd>'.$email.'</dd>
                                     <dt><b>Website:</b></dt>
                                    <dd>'.$website.'</dd>
                                </dl>
                            </div>';
                            echo '<div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                               
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td><b>Nome:</b></td>
                                        <td>'.$nome_real.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nome Artístico:</b></td>
                                        <td>'.$nome_art.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Telefone/Whats:</b></td>
                                        <td>'.$telefone.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Cidade:</b></td>
                                        <td>'.$cidade.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Estado:</b></td>
                                        <td>'.$estado.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Descrição:</b></td>
                                        <td>'.$descricao.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mail:</b></td>
                                        <td>'.$email.'</td>
                                    </tr>
                                    <tr>
                                        <td><b>Website:</b></td>
                                        <td>'.$website.'</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                         </div>
                    </div>';
                   echo '<div class="panel-footer">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><a style="color: #fff;" href="https://api.whatsapp.com/send?phone=55'.$telefone_2.'&amp;amp;text='.$nome_art.'"><i class="glyphicon glyphicon-envelope"></i></a></button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><a style="color: #fff;" href="../editar2.php?id='.$id.'"><i class="glyphicon glyphicon-edit"></i></a></button>';
                            ?>
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"> <a style="color: #fff;" href="#" onclick="return deleteUser('<?php echo $id ?>', '<?php echo $nome_real ?>')"> <i class="glyphicon glyphicon-remove"></i></a></button>
                        </span>
                        
                    <?php
                    echo '</div>
                </div>
            </div>
        </div>';
        $i = $i + 1;

    }
     pg_free_result($result);
    ?>


        
        
    </div>
</div>
</body>
</html>
