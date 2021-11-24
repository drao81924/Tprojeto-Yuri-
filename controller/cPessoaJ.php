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
require_once './model/pessoaJ.php';

class cPessoaJ {

    //put your code here
    public $PJ = [];

    public function __construct() {
        $this->mokPJ();
    }

    public function mokPJ() {
        $pj1 = new pessoaJ();
        $pj1->setNome('Senac');
        $pj1->setTelefone(5133443344);
        $pj1->setEmail('contato@senacrs.com.br');
        $pj1->setEndereco('Venancio Aires');
        $pj1->setCnpj(123123123000101);
        $pj1->setNomeFantasia('Senac Tech');
        $this->addPessoaJ($pj1);
        
        $pj2 = new pessoaJ();
        $pj2->setNome('Walmart');
        $pj2->setTelefone(51988998899);
        $pj2->setEmail('loja03@walmar.com');
        $pj2->setEndereco('Av dos Estados');
        $pj2->setCnpj(321321123000103);
        $pj2->setNomeFantasia('Nacional');
        $this->addPessoaJ($pj2);
    }

    public function getAll() {
        return $this->PJ;
    }
    
    public function addPessoaJ($p) {
        array_push($this->PJ,$p);
    }
    
    public function imprimePJ() {
        foreach ($this->PJ as $pes) {
            echo $pes;
        }
    }

}

?>