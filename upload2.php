<?php session_start();

if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}


//include "../db_postConfig.php";

date_default_timezone_set('America/Sao_Paulo'); 

//ALTER TABLE djs ADD COLUMN img_nome varchar(80);

$target_dir = "img_djs/";
$filename = $_FILES["myfile"]["name"]; // The file name
$target_file = $target_dir . $_FILES["myfile"]["name"];
$type = $_FILES["myfile"]["type"];

//$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
//$filename = pathinfo($_FILES['myfile']['name'], PATHINFO_FILENAME);

/* //apenas para debug
echo '<td>=' .$_FILES["myfile"]["tmp_name"]. '</td>|';      //$_FILES['myfile']['tmp_name'];
echo '<td>-nome do arquivo= ' .$filename. '</td>';  
echo '<td>-endereco final= ' .$target_file. '</td>';  
echo '<td>-tipo do arquivo? ' .$type. '</td>';  
//echo '<td>=' .$_FILES["myfile"]["tmp_name"]. '</td>';  
*/

//$type = exif_imagetype($_FILES['myfile']['tmp_name']);
$nome_completo = basename( $_FILES["myfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myfile"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["myfile"]["size"] > 500000) {
    echo "Desculpe, o arquivo é muito grande.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " Desculpe, apenas JPG, JPEG, PNG & GIF são permitidos. ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi enviado.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
        echo " O arquivo ". basename( $_FILES["myfile"]["name"]). " foi enviado.";
        
        // $result2 = pg_query("UPDATE djs SET img_nome = '$nome_completo '  WHERE id_dj ='20'"); 
        // echo '<meta http-equiv="refresh" content="0">';
        
    } else {
        echo " Houve algum problema ao enviar a imagem, tente novamente.";
    }
}

?>
