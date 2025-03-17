<?php
$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);

$erro = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];  
    $password = $_POST['password'];  

    $sql = "SELECT * FROM tb_login WHERE login = :login";
    $stmt = $banco->prepare($sql);
    $stmt->bindParam(':login', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        var_dump($_POST);
        if ($password === $user['senha']) {
            header("Location: inicio.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="login">
        <h2>Login do QG</h2>
        <form action="" method="POST" id="loginFormulario">
            <div class="inputInfos">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="inputInfos">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <?php if ($erro): ?>
            <p id="mensagemErro" style="color: red;"><?= $erro ?></p>
        <?php endif; ?>
        <p id="mensagemErro" style="color: red; display:none;">Usuário ou senha inválidos.</p>
        <a href="#" id="esqueciSenha" class="esqueci_senha">Esqueci a senha.</a>
        <a href="cadastrar.php" id="Cadastrar1" class="cadastrar" style="color: #4caf50;">Cadastrar.</a>
    </div>
</body>
</html>