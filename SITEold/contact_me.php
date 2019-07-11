<?php
// Check for empty fields

$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !$email_address){
  	echo "SEM DADOS!";
  	return false;
    //exit();
}

$name = $_POST['name'];
if ($email_address === FALSE){
    echo 'Invalid email';
    exit(1);
}
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'guilhemerps94@gmail.com'; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Mensagem do TOPDJSAPP:  $name";

//Const
define("TO", "guilhemerps94@gmail.com");
define("ASS", "Mensagem do TOPDJSAPP");


$email_body = "Você recebeu uma mensagem do site TOPDSAPP.\n\n"."Aqui estão os detalhes:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@flavinhodjjf.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email_address";	

mail($to, $email_subject, $email_body, $header);
return true;

  
 // if (mail("guilhemerps94@gmail.com", "Teste", "sfjsjkdfhdskjfhsdkjfhskj"))
  //echo '<meta http-equiv="refresh" content="0;url=http://www.seudominio.com.br/obrigado.html" />';
  
 // echo 'terminou';
?>
