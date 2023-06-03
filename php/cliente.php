<?php
    session_start();
    header("Location: agendamento.php");
    echo "Bem-Vindo: ". $_SESSION['usuarioNome'];   

?>
<br>
<a href="sair.php">Sair</a>