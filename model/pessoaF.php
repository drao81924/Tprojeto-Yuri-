<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pessoaF
 *
 * @author jairb
 */
require_once 'pessoa.php';

class pessoaF extends pessoa {

    //put your code here
    private $cpf;
    private $sexo;

    public function pessoaF() {
        
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    public function setSexo($sexo): void {
        $this->sexo = $sexo;
    }
    
    public function __toString() {
        $Pessoa = "Nome: " . $this->getNome() . "<br>"
                . "Tel: " . $this->getTelefone() . "<br>"
                . "email: " . $this->getEmail() . "<br>"
                . "Endereço: " . $this->getEndereco() . "<br>"
                . "CPF: " . $this->getCpf() . "<br>"
                . "Sexo: " . $this->getSexo() . "<br><br>";
        return $Pessoa;
    }

aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
}
?>