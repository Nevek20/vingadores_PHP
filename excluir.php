<?php
$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $banco->query("DELETE FROM tb_login WHERE id = $id");
}

header("Location: index.php");
exit;
?>