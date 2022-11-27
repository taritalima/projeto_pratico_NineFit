<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
require 'mailer/PHPMailerAutoload.php';

// require "../PHPMailer/src/SMTP.php";
// require '../PHPMailer/src/Exception.php';

// if (isset($_POST['nome']) && !empty($_POST['nome'])) {
//     $nome = $_POST['nome'];
// }
// if (isset($_POST['email']) && !empty($_POST['email'])) {
//     $email = $_POST['email'];
// }
if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
}

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'kevinblair317@gmail.com';
$mail->Password = 'Bke1908';
$mail->Port = 587;

$mail->setFrom('kevinblair317@gmail.com', 'Destinatário');
$mail->addAddress('kevinblair317@gmail.com', 'Remetente');

$mail->isHTML(true);

$mail->Body = nl2br($mensagem);
$mail->AltBody = nl2br(strip_tags($mensagem));

if (!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    header('Location: ../php/contato.php');
}



// $mail = new PHPMailer(true);
// $mail->isSMTP();

// try {
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->SMTPSecure = 'tls';
//     $mail->Username = 'kevinblair317@gmail.com';
//     $mail->Password = 'Bke1908@';
//     $mail->Port = 587;

//     $mail->setFrom('kevinblair317@gmail.com', 'Destinatário');
//     $mail->addAddress('kevinblair317@gmail.com', 'Remetente');

//     $mail->isHTML(true);
//     $mail->Subject = " inscrição -  cliente Ondontotech ";
//     $mail->Body = "Nome:";

//     $mail->send();
//     echo 'A mensagem foi enviada!';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


// if (mail($to, $subject, $body, $header)) {
//     echo ("Email enviado com Sucesso!");
// } else {
//     echo ("o Email não pode ser Enviado");
// }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="../css/style_contato.css">
</head>

<body>
    <section class="content">
        <div class="contato">
            <h3>Formulário de contato</h3>
            <form class="form" method="post" action="../php/contato.php">
                <input class="field" name="name" placeholder="Nome">
                <input class="field" name="email" placeholder="E-mail">
                <textarea class="field" name="mensagem" placeholder="Digite sua mensagem aqui"></textarea>
                <input class="field" type="submit" value="Enviar">
            </form>
        </div>
</body>

</html>