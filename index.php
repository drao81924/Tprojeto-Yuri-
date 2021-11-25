<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <?php
    function show($a,$l) {
        ?>
    <a href="./view/<?php echo $a;?>.php"><?php echo $l ?></a>
        <?php
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Primeiro Projeto - INF4T211</title>
        <link rel="icon" href="imagens/favicon.ico"/>
    </head>
    <body>
        <h1>Cadastro de Pessoas com POO</h1>
        <table><!--Cria Tabela -->
            <tr> <!--Cria linha -->
                <td> <!--Cria Coluna -->
                    <?php show('gerPesFisica','Ger. Pessoa Fisíca');?> |
                </td>
                <td>
                    <?php show('gerPesJuridica','Ger. Pessoa Jurídica');?>
                </td>
            </tr>
        </table><!--Fecha Tabela -->
        
    </body>
</html>
