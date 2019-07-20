<?php


session_start();

include "../db_postConfig.php";
 //require_once "config.php";




//https://www.youtube.com/watch?v=rHPWkoXFIKM

if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}


// excluindo a imagem do servidor //
$query  = "SELECT img_nome From djs WHERE id_dj ='{$_GET['id']}'";
$result1 = pg_query($query);
$file_name = pg_fetch_result($result1, 0, "img_nome"); 
unlink("../img_djs/" . $file_name);  


// excluindo do banco de dados //
$del = "DELETE FROM djs WHERE id_dj ='{$_GET['id']}'";
$querydel = pg_query($del);



if($querydel)
{
    //header('Location: gerenciador.php');
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=gerenciador.php">';
    
}

elseif(!$result)
{
    //header('Location:bbb.php');
      echo("Erro ao excluir");
}

//header('Location: gerenciador.php'); 

?>
