<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../controller/cPessoaJ.php';
$pjs = $_REQUEST['listaPessoasJ'];
$pjsBd = $_REQUEST['pessoasPJBD'];
$pjbd = new cPessoaJ();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th><th>E-mail</th><th>CNPJ</th><th>Funções</th>
            </tr><!--
            <?php foreach ($pjs as $pj): ?>
                            <tr>
                                <td><?php //echo $pf->getNome();     ?> </td>
                                <td><?php //echo $pf->getEmail();     ?> </td>
                                <td><?php //echo $pf->getCnpj();     ?> </td>
                            </tr>
            <?php endforeach; ?>-->
            <!-- Nova tabela a partir do BD -->
            <?php
            if ($pjsBd == null) {
                echo "Tabela vazia!";
            } else {
                foreach ($pjsBd as $pj):
                    ?>
                    <tr>
                        <td><?php echo $pj["nome"]; ?> </td>
                        <td><?php echo $pj["email"]; ?> </td>
                        <td><?php echo $pj["cnpj"]; ?> </td>
                        <td>
                            <form action="editarPessoaJ.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pj["idPessoa"]; ?>"/>
                                <input type="submit" name="update" value="Editar"/>
                            </form>
                            <form action="<?php $pjbd->deletarPessoaBD() ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pj["idPessoa"]; ?>"/>
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
