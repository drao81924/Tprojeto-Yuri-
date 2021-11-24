<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php

    function show($a) {
        ?>
        <a href="https://www.<?php echo $a ?>.com.br" target="blank"><?php echo $a ?></a>
        <?php
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Primeiro Projeto - INF4T211</title>
        <link rel="icon" href="imagens/favicon.ico"/>
    </head>
    <body>
        <table><!--Cria Tabela -->
            <tr> <!--Cria linha -->
                <td> <!--Cria Coluna -->
                    <h1>Jair Ferraz</h1>
                    <?php
                    // put your code here
                    echo '<h2>Hello World!!!</h2>';
                    echo '<p>Hello World!!!</p>';
                    $valor1 = 4;
                    $valor2 = 2;
                    $resultado = $valor1 % $valor2; // % mod ou modal, pega o resto da divisão
                    echo '<br>';
                    if ($resultado == 0) {
                        echo 'Num. ' . $valor1 . ' Par!';
                        //no PHP usa-se (.) para concatenar no Java (+)
                    } else {
                        echo 'Num. ' . $valor1 . ' Impar!';
                    }
                    echo '<br>'; //força quebra de linha
                    show('Google');
                    echo ' | ';
                    show('Terra');
                    echo ' | ';
                    show('Youtube');
                    ?>
                </td>
                <td>
                    <p>Form GET</p>
                    <form name="Pessoa1" method="GET">
                        <label>Nome:</label>
                        <input type="text" name="nome" id="nome" />
                        <br>
                        <label>Idade:</label>
                        <input type="number" name="idade" id="idade"/>
                        <br>
                        <input type="submit" value="Salvar" name="salvarGet"/>
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                </td>
                <td>
                    <p>Form POST</p>
                    <form name="Pessoa2" method="POST">
                        <input placeholder="Nome aqui ..." type="text" name="nome" id="nome" />
                        <br>
                        <input placeholder="Idade aqui ..." type="number" name="idade" id="idade"/>
                        <br>
                        <input type="submit" value="Salvar" name="salvarPost" />
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                </td><!--Fecha coluna -->
            </tr><!--Fecha Linha -->

            <?php
            if (isset($_GET['salvarGet'])) {
                $msg = 'Get: ' . $_GET['nome'] . ' tem ' . $_GET['idade'] . ' anos de vida.'
                        . ' E já viveu ' . $_GET['idade'] * 365 . ' dias aproximadamente.';
                //var_dump($msg);
                //echo '<br>';
                //print_r($msg);
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            if (isset($_POST['salvarPost'])) {
                $msg = 'Post: ' . $_POST['nome'] . ' tem ' . $_POST['idade'] . ' anos de vida.'
                        . ' E já viveu ' . $_POST['idade'] * 365 . ' dias aproximadamente.';
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }
            ?>
            <tr>
                <?php
                require_once './controller/cPessoaF.php';
                require_once './model/pessoaF.php';
                require_once './controller/cPessoaJ.php';
                require_once './model/pessoaJ.php';
                $cadPfs = new cPessoaF();
                $cadPjs = new cPessoaJ();
                $pesF = new pessoaF();
                $pesF->setNome('Fulana de Tal');
                $pesF->setTelefone(5198899888899);
                $pesF->setEmail('fulana@bol.com.br');
                $pesF->setEndereco('Rua Mario Quintana');
                $pesF->setCpf(321123321123);
                $pesF->setSexo('F');
                $cadPfs->addPessoaF($pesF);


                $pesJ = new pessoaJ();
                $pesJ->setNome('Stock Center');
                $pesJ->setTelefone(5130403040);
                $pesJ->setEmail('contato@stock.com.br');
                $pesJ->setEndereco('ERS 118');
                $pesJ->setCnpj(321321123000101);
                $pesJ->setNomeFantasia('Grupo Zafarri');
                $cadPjs->addPessoaJ($pesJ);
                ?>
                <td>
                    <p>Cadastro de PF</p>
                    <form name="pf" method="POST">
                        <input placeholder="Nome aqui ..." type="text" name="nome" id="nome" />
                        <br>
                        <input placeholder="Telefone aqui ..." type="tel" name="tel" id="tel"/>
                        <br>
                        <input placeholder="E-mail aqui ..." type="email" name="email" id="email"/>
                        <br>
                        <input placeholder="Endereço aqui ..." type="text" name="endereco" id="endereco"/>
                        <br>
                        <input placeholder="CPF aqui ..." type="number" name="cpf" id="cpf"/>
                        <br>
                        <input placeholder="Sexo aqui ..." type="text" name="sexo" id="sexo"/>
                        <br>
                        <input type="submit" value="Salvar" name="salvarPF" />
                        <input type="submit" value="Listar" name="listarPF" />
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                </td>
                <td>
                    <p>Cadastro de PJ</p>
                    <form name="pj" method="POST">
                        <input placeholder="Nome aqui ..." type="text" name="nome" id="nome" />
                        <br>
                        <input placeholder="Telefone aqui ..." type="tel" name="tel" id="tel"/>
                        <br>
                        <input placeholder="E-mail aqui ..." type="email" name="email" id="email"/>
                        <br>
                        <input placeholder="Endereço aqui ..." type="text" name="endereco" id="endereco"/>
                        <br>
                        <input placeholder="CNPJ aqui ..." type="number" name="cnpj" id="cnpj"/>
                        <br>
                        <input placeholder="Nome Fantasia aqui ..." type="text" name="nomeFantasia" id="nomeFantasia"/>
                        <br>
                        <input type="submit" value="Salvar" name="salvarPJ" />
                        <input type="submit" value="Listar" name="listarPJ" />
                        <input type="reset" value="Limpar" name="limpar" />
                    </form>
                    <?php
                    if (isset($_POST['salvarPF'])) {
                        $pf = new pessoaF();
                        $pf->setNome($_POST['nome']);
                        $pf->setTelefone($_POST['tel']);
                        $pf->setEmail($_POST['email']);
                        $pf->setEndereco($_POST['endereco']);
                        $pf->setCpf($_POST['cpf']);
                        $pf->setSexo($_POST['sexo']);
                        $cadPfs->addPessoaF($pf);
                        $cadPfs->imprimePF();
                    }
                    if (isset($_POST['listarPF'])) {
                        $cadPfs->imprimePF();
                    }
                    if (isset($_POST['salvarPj'])) {
                        
                    }
                    if (isset($_POST['listarPJ'])) {
                        $cadPjs->imprimePJ();
                    }
                    ?>
                </td>
                <?php
                echo "<td>";
                echo "<h3>Pessoa Fisica:</h3>";
                $cadPfs->imprimePF();
                echo "</td><td>";
                echo "<h3>Pessoa Juridica:</h3>";
                $cadPjs->imprimePJ();
                echo "</td>";
                ?>
            </tr>
        </table><!--Fecha Tabela -->
    </body>
</html>
