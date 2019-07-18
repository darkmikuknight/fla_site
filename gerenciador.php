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
<html>
<head>
 <title>Gerenciar de DJs</title>
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



</style>
</head>
<body>


<ul>
  <li><a href="ola.php">Home</a></li>
  <li><a href="../Formoid22.php">Cadastro de DJs</a></li>
  <li><a class="active" href="gerenciador.php">Gerenciar DJs</a></li>
  <li style="float:right"><a href="sair.php">Sair</a></li>
</ul>


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

#desc{
    width: 100%;
}

</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../alertifyjs/alertify.js"></script>
<link rel="stylesheet" type="text/css" href="../alertifyjs/css/alertify.css">

<b>

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
</script>



<?php

  $query = 'SELECT * from djs ORDER BY id_dj';

  $result = pg_query($query);
 
  $id=' ';

  $i = 0;
  echo '<html><body><table id="customers"><tr>';
  while ($i < pg_num_fields($result))
    {
      $fieldName = pg_field_name($result, $i);
      
      if($fieldName == "nome_real" && $i == 1)
        echo '<td><b>Nome real</b></td>';

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
        echo '<td id="desc"><b>Descrição</b></td>';

      if($fieldName == "img_nome" && $i == 8)
        echo '<td><b>Nome da Imagem</b></td>';
        
      if($fieldName == "email" && $i == 9)
        echo '<td><b>E-mail</b></td>';
     
      if($fieldName == "website" && $i == 10)
        echo '<td><b>Website</b></td>';

      elseif($i==0){
        echo '<td>' .$fieldName. '</td>';
        }

      $i = $i + 1;
    }
  echo '</tr>';
  $i = 0;

  while ($row = pg_fetch_row($result)) 
    {
      echo '<tr>';
      $count = count($row);
      $y = 0;
      while ($y < $count)
      {
        $c_row = current($row);
        echo '<td>' . $c_row . '</td>';
              
        next($row);
        $y = $y + 1;
      }
     
     $id= pg_fetch_result($result, $i, "id_dj"); // result eh a query toda, $i eh a linha atual e o "id_dj" eh a coluna que eu quero pegar
     $nome_real= pg_fetch_result($result, $i, "nome_real");
     
      //echo '<td> "ID="'.$id.'</td>';
      //echo '<td> "ID="'.$nome_real.'</td>';
      echo  '<td>   <a href="../editar2.php?id='.$id.'" class="btn btn-warning"" role="button" >Edit</a>';  
      ?>

      <td> <div class="btn-group" > <a href="#" onclick="return deleteUser('<?php echo $id ?>', '<?php echo $nome_real ?>')"  class="btn btn-danger btn-xs" role="button"  >Delete</a></div></td>
      
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

  echo '</table></body></html>';
?>

 
</body>
</html>
