<?php

namespace App\model;

class Pessoa{

    public $nome;
    public $tel;

    function __construct(string $nome, string $tel){
        $this->$nome = $nome;
        $this->$tel = $tel;
    }

   function getNome(){
      return $this->nome;
    }
}
