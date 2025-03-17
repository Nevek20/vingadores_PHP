<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

$dsn = 'mysql:dbname=bd_vingadores;host=localhost';
$user = 'root';
$pw = '';

$banco = new PDO($dsn,$user,$pw);

$select = 'SELECT * FROM tb_login';
$resultado = $banco->query($select)->fetchALL();

?>
<main class="container my-5"> 
    <table class="table table-striped"> 
    <button><a href="#">Criar novo Vingador</a></button> 
        <tr> 
            <td>ID</td> 
            <td>Nome</td> 
            <td>Endereço</td> 
            <td>Botões utilitários</td>
        </tr> 
    <?php foreach($resultado as $lista) { ?> 
        <tr> 
            <td> <?= $lista ['id'] ?> </td> 
            <td> <?php echo $lista ['nome_completo'] ?> </td> 
            <td> <?php echo $lista ['endereco'] ?></td>
            <td> 
                <a href="./abrir.php?id=<?= $lista['id'] ?>" class="btn btn-primary">Abrir</a> 
                <a href="./editar.php?id=<?= $lista['id'] ?>" class="btn btn-warning">Editar</a>  
                <a href="#" class="btn btn-danger">Excluir</a> 
            </td>
        </tr> 
    <?php } ?>
    </table> 
</main> 