<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaF
 *
 * @author jairb
 */
require_once '../model/pessoaF.php';

class cPessoaF {

//put your code here
    public $PF = []; //Array de pessoas fisica

    public function __construct() {
        $this->mokPF();
    }

    public function mokPF() {
        $pf1 = new pessoaF();
        $pf1->setNome('Jair Ferraz');
        $pf1->setTelefone(51999889988);
        $pf1->setEmail('jbferraz@senacrs.com.br');
        $pf1->setEndereco('Rua das Oliveiras');
        $pf1->setCpf(123321123321);
        $pf1->setSexo('M');
        $this->addPessoaF($pf1);

        $pf2 = new pessoaF();
        $pf2->setNome('Joca');
        $pf2->setTelefone(51988998899);
        $pf2->setEmail('joca@senacrs.com.br');
        $pf2->setEndereco('Rua sem saída');
        $pf2->setCpf(321123321123);
        $pf2->setSexo('M');
        $this->addPessoaF($pf2);
    }

    public function getAll() {
        $_REQUEST['listaPessoasF'] = $this->PF;
        $this->getAllPessoaPFBD();
        require_once '../view/listaPessoaF.php';
    }

    public function addPessoaF($p) {
        array_push($this->PF, $p);
    }

    public function imprimePF() {
        foreach ($this->PF as $pes) {
            echo $pes;
        }
    }

    public function formSalvar() {
        if (isset($_POST['salvarPF'])) {
            $pf = new pessoaF();
            $pf->setNome($_POST['nome']);
            $pf->setTelefone($_POST['tel']);
            $pf->setEmail($_POST['email']);
            $pf->setEndereco($_POST['endereco']);
            $pf->setCpf($_POST['cpf']);
            $pf->setSexo($_POST['sexo']);
            $this->addPessoaF($pf);
        }
    }

    public function salvarBD() {
        if (isset($_POST['salvarPF'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass);

            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }

            $getNome = $_POST['nome'];
            $getTelefone = $_POST['tel'];
            $getEmail = $_POST['email'];
            $getEndereco = $_POST['endereco'];
            $getCpf = $_POST['cpf'];
            $getSexo = $_POST['sexo'];

            $sql = "insert into `pessoa` (`nome`,`telefone`,`email`,`endereco`,"
                    . "`cpf`,`sexo`) values ('$getNome','$getTelefone',"
                    . "'$getEmail','$getEndereco','$getCpf',"
                    . "'$getSexo')";
            mysqli_select_db($conexao, 'inf4t211');
            $result = mysqli_query($conexao, $sql);
            if (!$result) {
                die('Erro ao inserir: ' . mysqli_error($conexao));
            }

            mysqli_close($conexao);
        }
    }

    public function getAllPessoaPFBD() {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!$conexao) {
            die('Sem conexão: ' . mysqli_error());
        }

        $sql = "select * from pessoa";
        $result = mysqli_query($conexao, $sql);
        $pfsBD = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pfsBD, $row);
            }
            $_REQUEST['pessoasPFBD'] = $pfsBD;
        } else {
            $_REQUEST['pessoasPFBD'] = 0;
        }
        mysqli_close($conexao);
    }

    public function deletarPessoaBD() {
        if (isset($_POST['delete'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);
            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }
            $id = $_POST['id'];
            $sql = "delete from pessoa where idPessoa = $id";
            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                die('Erro ao deletar: ' . mysqli_error($conexao));
            }

            echo 'Registro deletado com sucesso!';
            mysqli_close($conexao);
            header('Refresh: 0'); //recarrecar a página F5
        }
    }

    public function getPessoaFById($id) {
        $bdHost = 'localhost';
        $bdUser = 'root';
        $bdPass = '';
        $schema = 'inf4t211';
        $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);

        if (!conexao) {
            die('sem conexao: ' . mysqli_error());
        }
        $sql = "select * from pessoa where idPessoa = $id";
        $pfsBD = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($pfsBD, $row);
            }
            return $pfsBD;
        }
        mysqli_close($conexao);
    }

    public function updatePessoaF($id) {
        if (isset($_POST['updatePF'])) {
            $bdHost = 'localhost';
            $bdUser = 'root';
            $bdPass = '';
            $schema = 'inf4t211';
            $conexao = mysqli_connect($bdHost, $bdUser, $bdPass, $schema);
            if (!$conexao) {
                die('Sem conexão: ' . mysqli_error());
            }
            $getIdPessoa = $_POST['idPessoa'];
            $getNome = $_POST['nome'];
            $getTelefone = $_POST['tel'];
            $getEmail = $_POST['email'];
            $getEndereco = $_POST['endereco'];
            $getCpf = $_POST['cpf'];
            $getSexo = $_POST['sexo'];
            $sql = "UPDATE `pessoa` SET `nome`='$getNome',`telefone`='$getTelefone',"
                    . "`email`='$getEmail',`endereco`='$getEndereco',`cpf`='$getCpf',"
                    . "`sexo`='$getSexo' WHERE `idPessoa`='$getIdPessoa'";
            $result = mysqli_query($conexao, $sql);
            if (!result) {
                die('Erro ao atualizar: ' . mysqli_error($conexao));
                mysqli_close($conexao);
            }
        }
    }

}

?>