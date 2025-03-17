<?php

$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn, $user, $pw);

$select = 'SELECT id, login, nome_completo, endereco FROM tb_login WHERE id = :id';

$dados = $banco->query($select)->fetchall();

echo '<pre>';

?>
<html lang="pt-br">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!--faz o link com o bootstrap -->

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
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" value="<?= $dados['endereco'] ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                </div>
            </section>
        </form>
    </div>
</main>
</html>