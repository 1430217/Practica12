<?php 
    session_start();
    session_destroy();
    header('Location: index.php');
?>
<h1>Ha salido de la sesión</h1>