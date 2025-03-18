<?php
$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);

$idE = $_GET['id'] ?? null; //esse ?? serve para verificar se uma variável está definida e não é null!!!!!!

if ($idE) {
    $select = 'SELECT * FROM tb_login WHERE id = :id';
    $dados = $banco->prepare($select);
    $dados->execute([':id' => $idE]);
    $user = $dados->fetch(PDO::FETCH_ASSOC); //Esse FETCH_ASSOC é uma constante que indica como os dados devem ser retornados (um array associativo, onde as chaves são os nomes das colunas do banco de dados e os valores são os dados dessa linha)

    $nomeE = $_POST['nome_completo'] ?? $user['nome_completo']; //se 'nome_completo' estiver presente no array $_POST e não for null, $nomeE receberá o valor de $_POST['nomeE']    Espero q eu tenha entendido BEM!
    $loginE = $_POST['login'] ?? $user['login'];
    $logradouroE = $_POST['logradouro'] ?? $user['logradouro'];
    $cpfE = $_POST['cpf'] ?? $user['cpf'];
    $tel1E = $_POST['tel1'] ?? $user['tel1'];
    $tel2E = $_POST['tel2'] ?? $user['tel2'];
    $n_casaE = $_POST['n_casa'] ?? $user['n_casa'];
    $bairroE = $_POST['bairro'] ?? $user['bairro'];
    $nascimentoE = $_POST['nascimento'] ?? $user['nascimento'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){  //se o método for POST (indicando que o formulário foi enviado) o código dentro do if será executado daquele jeito
        $update = 'UPDATE tb_login SET nome_completo = :nome_completo, login = :login, logradouro = :logradouro, cpf = :cpf, tel1 = :tel1, tel2 = :tel2, n_casa = :n_casa, bairro = :bairro, nascimento = :nascimento WHERE id = :id';
        $dados = $banco->prepare($update);
        $dados->execute([
            ':id' => $idE,
            ':nome_completo' => $nomeE,
            ':login' => $loginE,
            ':logradouro' => $logradouroE,
            ':cpf' => $cpfE,
            ':tel1' => $tel1E,
            ':tel2' => $tel2E,
            ':n_casa' => $n_casaE,
            ':bairro' => $bairroE,
            ':nascimento' => $nascimentoE
        ]);
        header('Location: inicio.php');
        exit;
    }
}
?>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: gray;">
<main class="container my-5 d-flex justify-content-center align-items-center min-vh-100"> 
    <div class="text-center"> 
        <h2>Editar Usuário</h2>
        <form action="editar.php?id=<?= $idE ?>" method="POST"> 
            <section class="coluna" style="display: block;">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" value="<?= $idE ?>" id="disabledTextInput" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="nome_completo" class="form-label">Nome Completo</label>
                    <input type="text" value="<?= $nomeE ?>" class="form-control" name="nome_completo">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" value="<?= $loginE ?>" class="form-control" name="login">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Logradouro</label>
                    <input type="text" value="<?= $logradouroE ?>" class="form-control" name="logradouro">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">CPF</label>
                    <input type="text" value="<?= $cpfE ?>" class="form-control" name="cpf">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Telefone 1</label>
                    <input type="text" value="<?= $tel1E ?>" class="form-control" name="tel1">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Telefone 2</label>
                    <input type="text" value="<?= $tel2E ?>" class="form-control" name="tel2">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nr da casa</label>
                    <input type="text" value="<?= $n_casaE ?>" class="form-control" name="n_casa">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Bairro</label>
                    <input type="text" value="<?= $bairroE ?>" class="form-control" name="bairro">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nascimento</label>
                    <input type="text" value="<?= $nascimentoE ?>" class="form-control" name="nascimento">
                </div>
                <button type="submit" class="btn btn-primary">Enviar alterações</button>
            </section>
        </form>
    </div>
</main>
</body>
</html>
<!-- 

⠀⠀⢠⠁⠀⠀⠀⠀⠀⢀⣾⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠠⣯
⠀⠘⠁⠀⠀⠀⠀⠶⠠⣾⣽⡻⣽⣿⣿⣿⡿⣞⣯⣆⠀⠀⠠⠀⠀⠄⡀⠀⡄⣿
⠄⢰⠆⠀⠀⢠⢏⢀⣠⣈⠛⢿⣿⡿⣿⢧⢟⣿⡟⠁⠀⠀⠀⠀⠀⠀⠀⠠⠐⣿
⢴⡄⡆⠀⠀⠠⠀⠙⠀⢀⠀⠀⠛⠂⠉⠆⠉⠉⠀⢀⠀⠀⠀⠨⠀⠀⠀⠀⢸⣷
⠲⡝⠌⠀⠀⢨⠂⠀⠀⠈⠀⠁⠀⠀⢩⣥⠀⠀⠀⠁⠁⣀⢠⢔⡀⠀⢀⣑⣾⣿
⢡⢄⠄⠀⠀⠀⠀⢐⣳⣶⣤⡶⠂⠠⢿⡔⠀⠩⢶⣸⣶⣧⡹⡃⠀⢀⢺⣿⢿⣿
⢻⡭⠀⠀⢀⠀⠀⠀⠹⠿⢉⣄⠸⢰⣿⣿⡷⠗⠠⣙⠻⣿⣿⠀⠀⡄⠹⡫⠀⣻
⢙⣷⣾⡦⠀⠂⠀⠀⠀⠘⠯⣶⣶⣄⡛⣋⣠⣾⣿⣿⠄⠀⠈⡀⠈⡚⡃⠏⠉⠋
⢿⡙⣻⠉⢆⠐⠁⠰⣠⠀⠀⠀⡀⠀⠁⠀⠁⠀⠀⠀⠀⠀⠎⢀⠚⢑⠯⡀⡀⣹
⠈⠡⠧⣇⢒⠄⠐⠂⡔⠈⠄⠀⠀⢚⠃⡛⠈⡡⠀⢀⡓⠠⠂⠘⢾⢼⡁⣠⢴⣿
⠀⠀⡀⠈⠉⠀⠌⠠⡴⡅⠂⠀⠀⢩⡁⡁⡬⠀⠀⡚⣠⠇⠀⠀⠸⠍⡮⣗⡥⣿
⡧⠀⠀⠄⠀⠐⠀⠀⠁⡁⠀⢿⡗⠦⠶⠶⠶⣖⣽⣠⠋⠀⠘⠀⠈⠂⠛⣶⣻⣿
⡗⠂⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⢯⣶⡒⣠⣶⣿⡿⡗⠂⠀⠀⠀⠀⠀⠈⢥⣿⣿
⠑⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢦⢺⢯⣿⣿⣿⡿⡿⠁⠀⠀⠀⠀⠀⠀⠀⢈⢯⠟

Eu estou louco, n to entendendo nada e 20% desse codigo eh chatGPT, 40% peguei do chamadinha e o resto fiz na maior gambiarra ja vista na história..............

Receita de bolo fofinho:

    1
    Bata as claras em neve e reserve.

    2
    Misture as gemas, a margarina e o açúcar até obter uma massa homogênea.

    3
    Acrescente o leite e a farinha de trigo aos poucos, sem parar de bater.

    4
    Por último, adicione as claras em neve e o fermento.

    5
    Despeje a massa em uma forma grande de furo central untada e enfarinhada.

    6
    Asse em forno médio 180 °C, preaquecido, por aproximadamente 40 minutos ou ao furar o bolo com um garfo, este saia limpo.

Obrigado pela atenção!!!!!!!!!!!!
-->