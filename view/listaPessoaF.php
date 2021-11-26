<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once '../controller/cPessoaF.php';
$pfs = $_REQUEST['listaPessoasF'];
$pfsBd = $_REQUEST['pessoasPFBD'];
$pfbd = new cPessoaF();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th><th>E-mail</th><th>CPF</th><th>Funções</th>
            </tr><!--
            <?php foreach ($pfs as $pf): ?>
                        <tr>
                            <td><?php //echo $pf->getNome();    ?> </td>
                            <td><?php //echo $pf->getEmail();    ?> </td>
                            <td><?php //echo $pf->getCpf();    ?> </td>
                        </tr>
            <?php endforeach; ?>-->
            <!-- Nova tabela a partir do BD -->
            <?php
            if ($pfsBd == null) {
                echo "Tabela vazia!";
            } else {
                foreach ($pfsBd as $pf):
                    ?>
                    <tr>
                        <td><?php echo $pf["nome"]; ?> </td>
                        <td><?php echo $pf["email"]; ?> </td>
                        <td><?php echo $pf["cpf"]; ?> </td>
                        <td>
                            <form action="editarPessoaF.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pf["idPessoa"]; ?>"/>
                                <input type="submit" name="update" value="Editar"/>
                            </form>
                            <form action="<?php $pfbd->deletarPessoaBD() ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pf["idPessoa"]; ?>"/>
                                <input type="submit" name="delete" value="Deletar"/>
                            </form>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </table>
    </body>
</html>
