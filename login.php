<?php include "db_mysqlConfig.php";

session_start();
$_SESSION["variable"] = value;

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $password =  hash('sha256', ($_POST["password"]));
	 if ($name == '' || $password == '') {
        $msg = "Preencha todos os campos";
    } else {
        $sql = "SELECT * FROM usuario WHERE login = '$name' AND senha = '$password'";
        $query = mysql_query($sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }

        if (mysql_num_rows($query) > 0) {
         
         	$sql2 = "INSERT INTO login_log (login) VALUES ('$name')";
         	$query2 = mysql_query($sql2);
         	if ($query2 === false) {
            echo "Could not successfully run query ($sql2) from DB: " . mysql_error();
            exit;
	        }

            $_SESSION["loggedIn"] = true;
            header('Location: ola.php');
            exit;
        }

        $msg = "Login e senha incorretos";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link href="style_login.css" rel="stylesheet" type="text/css">

</head>
<body>

	<form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		<table class="form" border="0">

			<tr>
			<td></td>
				<td style="color:red;">
				<?php echo $msg; ?></td>
			</tr> 
			
			<tr>
			  <th>&nbsp;</th>
			  <td id="titulo">Digite o nome de usuário e a senha:</td>
		  </tr>
			<tr>
				<th><label for="name"><strong>Login:</strong></label></th>
				<td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Senha:</strong></label></th>
				<td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
			</tr>
			<tr>
			<td height="49"></td>
				<td class="submit-button-right">
				<input class="send_btn" type="submit" value="Entrar" alt="Submit" title="Submit" />
				
				<input class="send_btn" type="reset" value="Apagar" alt="Reset" title="Reset" /></td>
				
			</tr>
		</table>
	</form>

</body>
</html>
