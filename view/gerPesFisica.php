<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// put your code here
require_once '../controller/cPessoaF.php';
$gerPF = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ger. Pessoa Fisíca</title>
    </head>
    <body>
        <h1>Ger. Pessoa Fisíca</h1>
        <a href="../index.php">Voltar</a>
        <br><br>
        <form action="<?php $gerPF->salvarBD(); ?>" method="POST">
            <input placeholder="Nome aqui ..." type="text" required name="nome"/>
            <br><br>
            <input placeholder="Telefone aqui ..." required type="tel" name="tel"/>
            <br><br>
            <input placeholder="E-mail aqui ..." required type="email" name="email"/>
            <br><br>
            <input placeholder="Endereço aqui ..." required type="text" name="endereco"/>
            <br><br>
            <input placeholder="CPF aqui ..." required type="number" name="cpf"/>
            <br><br>
            <input type="radio" value="F" name="sexo"/>Feminino
            <input type="radio" value="M" name="sexo"/>Masculino
            <br><br>
            <input type="submit" value="Salvar" name="salvarPF" />
            <input type="reset" value="Limpar" name="limpar" />
        </form>
        <br><br>
        <?php
        $gerPF->getAll();
        ?>

    </body>
</html>
