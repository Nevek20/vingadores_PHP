<?php
$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);

$erro = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cpf = $_POST['login'];
    $senhaNova = $_POST['senha'];

    $query = 'SELECT * FROM tb_login WHERE cpf = :cpf';
    $dados = $banco->prepare($query);
    $dados->execute([':cpf' =>$cpf]);
    $user = $dados->fetch(PDO::FETCH_ASSOC); //Esse FETCH_ASSOC é uma constante que indica como os dados devem ser retornados (um array associativo, onde as chaves são os nomes das colunas do banco de dados e os valores são os dados dessa linha)

    if($user){
        $upQuery = 'UPDATE tb_login SET senha = :senha WHERE cpf = :cpf';
        $dadosUp = $banco->prepare($upQuery);
        $dadosUp->execute([
            ':senha' =>$senhaNova,
            ':cpf' => $cpf
        ]);
    } else {
        $erro = "CPF inválido."; 
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
        <h2>Recuperação de senha</h2>
        <form action="" method="POST" id="loginFormulario">
            <div class="inputInfos">
                <label for="login">CPF</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="inputInfos">
                <label for="senha">Nova senha</label>
                <input type="senha" id="senha" name="senha" required>
            </div>
            <button type="submit">Mudar senha</button>
        </form>
        <?php if ($erro): ?>
            <p id="mensagemErro" style="color: red;"><?= $erro ?></p>
        <?php endif; ?>
        <a href="index.php" id="Cadastrar1" class="cadastrar" style="color: #4caf50;">Voltar a tela inicial.</a>
        <a href="cadastrar.php" id="Cadastrar1" class="cadastrar" style="color: #4caf50;">Ou... Cadastrar.</a>
    </div>
</body>
</html>