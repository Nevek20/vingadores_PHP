<?php
$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);
$banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuração para exibir erros

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $nome = $_POST['nome_completo'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO tb_login (login, senha, nome_completo, endereco) VALUES (:login, :senha, :nome_completo, :endereco)";
    $stmt = $banco->prepare($sql);

    // Ligando os parâmetros
    $stmt->bindParam(':login', $username);
    $stmt->bindParam(':senha', $password);
    $stmt->bindParam(':nome_completo', $nome);
    $stmt->bindParam(':endereco', $endereco);

    if ($stmt->execute()) {

        header("Location: index.php");
        exit;
    } else {
        echo "<p>Erro ao cadastrar. Tente novamente.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="./assets/css/cadastrar.css">
</head>
<body>
    <div class="login">
        <h2>Cadastro do Vingador</h2>
        <!-- Formulário com método POST -->
        <form action="" method="POST" id="loginFormulario">
            <div class="inputInfos">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="inputInfos">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="inputInfos">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="inputInfos">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php" id="esqueciSenha" class="esqueci_senha">Voltar</a>
    </div>
</body>
</html>
