<?php
    session_start();
    echo "Bem Vindo: ". $_SESSION['usuarioNome'];    
?>
<br>
<a href="sair.php">Sair</a>