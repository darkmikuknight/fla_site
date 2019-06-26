<?php


session_start();

include "../db_postConfig.php";
 //require_once "config.php";




//https://www.youtube.com/watch?v=rHPWkoXFIKM

if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}



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
