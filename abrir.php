<?php

$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);

$banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$dados = $banco->prepare('SELECT id, nome_completo, logradouro, cpf, tel1, tel2, n_casa, bairro, nascimento FROM tb_login WHERE id = :id');
$dados->bindParam(':id', $id, PDO::PARAM_INT);
$dados->execute();
$dados = $dados->fetch(PDO::FETCH_ASSOC);

?>
<html lang="pt-br">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!--faz o link com o bootstrap -->
<body style="background-color: gray;"> 
    <main class="container my-5 d-flex justify-content-center align-items-center min-vh-100"> 
        <div class="text-center"> 
            <form action="#"> 
                <section class="coluna" style="display: block,;">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" value="<?=$dados['id']?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nome_completo" class="form-label">Nome Completo</label>
                        <input type="text" value="<?= $dados['nome_completo'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="cpf">CPF</label>
                        <input type="text" value="<?= $dados['cpf'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tel1">Telefone 1</label>
                        <input type="text" value="<?= $dados['tel1'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tel2">Telefone 2</label>
                        <input type="text" value="<?= $dados['tel2'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="logradouro" class="form-label">Logradouro</label>
                        <input type="text" value="<?= $dados['logradouro'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="n_casa">Nr da casa</label>
                        <input type="text" value="<?= $dados['n_casa'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" value="<?= $dados['bairro'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nascimento">Data de nascimento</label>
                        <input type="date" value="<?= $dados['nascimento'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                    </div>
                </section>
            </form>
        </div>
    </main>
</body>
</html>