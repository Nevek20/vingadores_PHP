<?php

$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);
$banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

$SELECT = 'SELECT id, login, nome_completo, cpf, tel1, tel2, logradouro, n_casa, bairro, nascimento FROM tb_login WHERE id = :id';
$dados = $banco->prepare($SELECT);
$dados->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$dados->execute();
$dale = $dados->fetch(PDO::FETCH_ASSOC); 

?>
<html lang="pt-br">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<main class="container my-5 d-flex justify-content-center align-items-center min-vh-100"> 
    <div class="text-center"> 
        <form action="#"> 
            <section class="coluna" style="display: block,;">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" value="<?=$dale['id']?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                </div>
                <div class="mb-3">
                    <label for="nome_completo" class="form-label">Nome Completo</label>
                    <input type="text" value="<?= $dale['nome_completo'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" >
                </div>
                <div class="mb-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" value="<?= $dale['logradouro'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" >
                </div>
                <button type="submit" class="btn btn-primary">Enviar alterações</button>
            </section>
        </form>
    </div>
</main>
</html>