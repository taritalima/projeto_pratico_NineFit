<?php

$mensagem_class = "";
$nome = "";
$sobrenome = "";
$email = "";
$telefone = "";
$msg = "";

if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["email"], $_POST["telefone"], $_POST["msg"])) {
    $conexao = new PDO("mysql:host=localhost;dbname=projeto_uninove", "root", "");

    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_input(INPUT_POST, "msg");


    if (!$nome || !$sobrenome || !$email || !$telefone || !$msg) {
        $mensagem = "Dados Inválidos!";
        $mensagem_class = "erro";
    } else {
        $stm = $conexao->prepare('INSERT INTO agendamento(nome,sobrenome,email,telefone,mensagem) VALUES(:nome,:sobrenome,:email,:telefone,:msg)');
        $stm->bindParam('nome', $nome);
        $stm->bindParam('sobrenome', $sobrenome);
        $stm->bindParam('email', $email);
        $stm->bindParam('telefone', $telefone);
        $stm->bindParam('msg', $msg);
        $stm->execute();

        $mensagem = "Mensagem enviada com Sucesso!";

        $nome = "";
        $sobrenome = "";
        $email = "";
        $telefone = "";
        $msg = "";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_agendamento.css">
</head>

<body>
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="#"><img src="../img/logofit1.png"></a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8080/projeto_pratico%20_2/php/index.php"><i class="fas fa-tachometer-alt"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8080/projeto_pratico%20_2/php/agendamento.php"><i class="far fa-calendar-alt"></i>Agendamento</a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <form method="post">
            <label>Nome</label>
            <input type="text" name="nome" value="<?= $nome ?>" required />

            <label>Sobrenome</label>
            <input type="text" name="sobrenome" value="<?= $sobrenome ?>" required />

            <label>E-mail</label>
            <input type="text" name="email" value="<?= $email ?>" required />

            <label>Telefone</label>
            <input type="text" name="telefone" value="<?= $telefone ?>" required />

            <label>Mensagem</label>
            <textarea name="msg"><?= $nome ?></textarea>
            <button type="submit">Enviar</button>
        </form>

        <div class="mensagem"><?= $mensagem ?>
        </div>
    </main>
</body>

</html>