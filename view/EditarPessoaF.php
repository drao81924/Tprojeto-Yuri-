<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaF.php';
$idPessoa = 0;
if (isset($_POST['update'])) {
    $idPessoa = $_POST['id'];
}
$cadPfs = new cPessoaF();
$pessoaF = $cadPfs->getPessoaFById($idPessoa);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Pessoa Física</h1>
        <br><br>
        <form action="<?php $cadPfs->updatePessoaF(); ?>" method="POST">
            <input value="<?php echo $pessoaF[0]['idPessoa']; ?>"  type="hidden" name="idPessoa"/>
            <input value="<?php echo $pessoaF[0]['nome']; ?>" type="text" required name="nome"/>
            <br><br>
            <input value="<?php echo $pessoaF[0]['telefone']; ?>" required type="tel" name="tel"/>
            <br><br>
            <input value="<?php echo $pessoaF[0]['email']; ?>" required type="email" name="email"/>
            <br><br>
            <input value="<?php echo $pessoaF[0]['endereco']; ?>" required type="text" name="endereco"/>
            <br><br>
            <input placeholder="<?php echo $pessoaF[0]['cpf']; ?>" required type="number" name="cpf"/>
            <br><br>
            <input type="radio" <?php if($pessoaF[0]['sexo']=="F"){echo "checked";} ?> value="F" name="sexo"/>Feminino
            <input type="radio" <?php if($pessoaF[0]['sexo']=="M"){echo "checked";} ?> value="M" name="sexo"/>Masculino
            <br><br>
            <input type="submit" value="Salvar" name="updatePF" />
            <input type="submit" value="Cancelar" name="cancelarUp" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
