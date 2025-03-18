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
    $dados = $banco->prepare($sql);
    $dados->bindParam(':login', $username);
    $dados->execute();
    $user = $dados->fetch(PDO::FETCH_ASSOC); //Esse FETCH_ASSOC é uma constante que indica como os dados devem ser retornados (um array associativo, onde as chaves são os nomes das colunas do banco de dados e os valores são os dados dessa linha)
    
    if ($user) {
        //var_dump($_POST);
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
<body style="background-color: gray;">
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
        <a href="esqueci.php" id="esqueciSenha" class="esqueci_senha">Esqueci a senha.</a>
        <a href="cadastrar.php" id="Cadastrar1" class="cadastrar" style="color: #4caf50;">Cadastrar.</a>
    </div>
</body>
</html>