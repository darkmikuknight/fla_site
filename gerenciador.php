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


</head>

<body>

  <style>
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 3px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #cccdfc;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    #topo_colunas{
     background-color: #111;
     color: #d0cc6b; 
    }

    #desc{
        width: 100%;
    }
    
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }

    


  </style>

  <script language = "JavaScript" >
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


 $(document).ready(function() {
           // $('#btnHide').click(function() {
                $('td:nth-child(1)').hide();
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
          //  });
        });


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
          <li class="nav-item">
            <a class="nav-link" href="ola.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Formoid22.php">Cadastro de DJs</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="gerenciador.php">Gerenciar DJs</a>
             <span class="sr-only">(current)</span>
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
  <?php

  $query = 'SELECT * from djs ORDER BY id_dj';

  $result = pg_query($query);
 
  $id=' ';

  $i = 0;
  echo '<div class="table-responsive">';
  echo '<table  class="table table-hover table-bordered" id="customers"><thead><tr style="background-color: #111;color: #d0cc6b;">';
  while ($i < pg_num_fields($result))
    {
      $fieldName = pg_field_name($result, $i);
      
      if($fieldName == "nome_real" && $i == 1)
        echo '<td><b>Nome Real</b></td>';

      if($fieldName == "nome_art" && $i == 2)
        echo '<td><b>Nome Artístico</b></td>';

      if($fieldName == "telefone" && $i == 3)
        echo '<td><b>Cel/Whatsapp</b></td>';

      if($fieldName == "telefone2" && $i == 4)
        echo '<td><b>Telefone2</b></td>';

      if($fieldName == "cidade" && $i == 5)
        echo '<td><b>Cidade</b></td>';

      if($fieldName == "estado" && $i == 6)
        echo '<td><b>Estado</b></td>';

      if($fieldName == "descricao" && $i == 7)
        echo '<td><b>Descrição</b></td>';

      if($fieldName == "img_nome" && $i == 8)
        echo '<td><b>Imagem</b></td>';
        
      if($fieldName == "email" && $i == 9)
        echo '<td><b>E-mail</b></td>';
     
      if($fieldName == "website" && $i == 10)
        echo '<td><b>Website</b></td>';

      elseif($i==0){
        echo '<td><div class="ocultar_id">' .$fieldName. '</div></td>';
        }

      $i = $i + 1;
    }
  echo '<td colspan="2"><b>Ações</b></td>';
  echo '</tr></thead><tbody>';
  $i = 0;

  while ($row = pg_fetch_row($result)) 
    {
      echo '<tr>';
      $count = count($row);
      $y = 0;
      while ($y < $count)
      {
        $c_row = current($row);
        
        $img_nome= pg_fetch_result($result, $i, "img_nome");
        if($c_row == $img_nome)
            echo '<td><img id="img" src="../img_djs/'.$img_nome.'" style="width:200px;height:60px;"></td>';
        
        /*$id_dj= pg_fetch_result($result, $i, "id_dj");
        if($c_row == $id_dj)
            echo '<td hidden>' . $c_row . '</td>';*/

        else
            echo '<td>' . $c_row . '</td>';
              
        next($row);
        $y = $y + 1;
      }
     
     $id= pg_fetch_result($result, $i, "id_dj"); // result eh a query toda, $i eh a linha atual e o "id_dj" eh a coluna que eu quero pegar
     $nome_real= pg_fetch_result($result, $i, "nome_real");
     $img_nome= pg_fetch_result($result, $i, "img_nome");
     
      //echo '<td><img id="img" src="../img_djs/'.$img_nome.'" style="width:100px;height:30px;"></td>';
     
      //echo '<td> "ID="'.$id.'</td>';
      //echo '<td> "ID="'.$nome_real.'</td>';
     
     echo  '<td>   <a href="../editar2.php?id='.$id.'" class="edit" title="Edit" data-toggle="tooltip" role="button" ><i class="material-icons">&#xE254;</i></a></td>';  
      ?>

       <td><div class="btn-group" > <a href="#" onclick="return deleteUser('<?php echo $id ?>', '<?php echo $nome_real ?>')"  class="delete" title="Delete" data-toggle="tooltip"  role="button"  ><i class="material-icons">&#xE872;</i></a></div></td>
      
      <?php


      /// FUNCIONAOD MAIS OU MENOS ///
      // echo '<td>  <a href="#" onclick="return deleteUser('.$id.')"  class="btn btn-danger btn-xs" role="button"  >Delete</a></td>';

      /*
      echo  '<td> <div class="btn-group" data-toggle="buttons"> <a href="#" target="_blank" class="btn btn-warning btn-xs">Edit</a><a onclick="javascript:confirmationDelete($(this));return false;" href="excluir.php?id='.$id.'" target="_blank" class="btn btn-danger btn-xs">Delete</a><a href="#" target="_blank" class="btn btn-primary btn-xs">View</a></div></td>';
      */
           
      //if($fieldName
      //echo '<td>' . $id. '</td>';
      echo '</tr>';
      $i = $i + 1;
    }
  pg_free_result($result);

  echo '</tbody></table></div>';
?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
