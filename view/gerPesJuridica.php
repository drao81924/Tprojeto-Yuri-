<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaJ.php';
$gerPJ = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger. Pessoa Jurídica</title>
    </head>
    <body>
        <h1>Ger. Pessoa Jurídica</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $gerPJ->salvarBD(); ?>" method="POST">
            <input placeholder="Nome aqui ..." type="text" required name="nome"/>
            <br><br>
            <input placeholder="Telefone aqui ..." type="tel" name="tel"/>
            <br><br>
            <input placeholder="E-mail aqui ..." type="email" name="email"/>
            <br><br>
            <input placeholder="Endereço aqui ..." type="text" name="endereco"/>
            <br><br>
            <input placeholder="CNPJ aqui ..." type="number" name="cnpj"/>
            <br><br>
            <input placeholder="Nome Fantasia aqui ..." type="text" name="nomeFantasia"/>
            <br><br>
            <input type="submit" value="Salvar" name="salvarPJ" />
            <input type="reset" value="Limpar" name="limpar" />
        </form>
        <br><br>
        <?php
        $gerPJ->getAll();
        ?>
    </body>
</html>
