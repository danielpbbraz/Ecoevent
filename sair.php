<?php
session_start();
unset($_SESSION['nomeUser']);
unset($_SESSION['senhaUser']);
header('Location: Index.php');
?>