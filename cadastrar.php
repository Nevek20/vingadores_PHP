<?php
$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);
$banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //configura o PDO para lançar exceções em caso de erro, facilitando o tratamento de falhas e a minha vida

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login'];
    $password = $_POST['senha']; 
    $nome_completo = $_POST['nome_completo'];
    $cpf = $_POST['cpf'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $logradouro = $_POST['logradouro'];
    $n_casa = $_POST['n_casa'];
    $bairro = $_POST['bairro'];
    $nascimento = $_POST['nascimento'];

    $sql = "INSERT INTO tb_login (login, senha, nome_completo, cpf, tel1, tel2, logradouro, n_casa, bairro, nascimento) VALUES (:login, :senha, :nome_completo, :cpf, :tel1, :tel2, :logradouro, :n_casa, :bairro, :nascimento)";
    $dados = $banco->prepare($sql);

    // Ligando os parâmetros
    $dados->bindParam(':login', $username); // Associa o parâmetro :login com a variável $login e por ai vai
    $dados->bindParam(':senha', $password);
    $dados->bindParam(':nome_completo', $nome_completo);
    $dados->bindParam(':cpf', $cpf);
    $dados->bindParam(':tel1', $tel1);
    $dados->bindParam(':tel2', $tel2);
    $dados->bindParam(':logradouro', $logradouro);
    $dados->bindParam(':n_casa', $n_casa);
    $dados->bindParam(':bairro', $bairro);
    $dados->bindParam(':nascimento', $nascimento);

    if ($dados->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "<p>ERRO: cadastro não concluído...</p>"; //essa ideia do chat foi boa hein
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
<body style="background-color: gray;">
    <div class="login">
        <h2>Cadastro do Vingador</h2>
        <form action="" method="POST" id="loginFormulario">
            <div class="inputInfos">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="login" required>
            </div>
            <div class="inputInfos">
                <label for="password">Senha</label>
                <input type="password" id="password" name="senha" required>
            </div>
            <div class="inputInfos">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome_completo" required>
            </div>
            <div class="inputInfos">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf">
            </div>
            <div class="inputInfos">
                <label for="nascimento">Data de nascimento</label>
                <input type="date" name="nascimento" id="nascimento">
            </div>
            <div class="inputInfos">
                <label for="logradouro">logradouro</label>
                <input type="text" id="logradouro" name="logradouro" required>
                <label for="n_casa">Nr da casa</label>
                <input type="text" id="n_casa" name="n_casa" required>
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" required>
            </div>
            <div class="inputInfos">
                <label for="tel1">Telefone 1</label>
                <input type="text" name="tel1" id="tel1">
                <label for="tel2">Telefone 2</label>
                <input type="text" name="tel2" id="tel2">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php" id="esqueciSenha" class="esqueci_senha">Voltar</a>
    </div>
</body>
</html>
