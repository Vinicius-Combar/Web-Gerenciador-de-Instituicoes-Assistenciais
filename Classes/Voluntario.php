<?php

class Voluntario extends \Pessoa
{
    private $idvoluntario;
    private $tipo;
    public function __construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo,$idvoluntario,$idpessoa,$tipo)
    {
        parent::__construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->idvoluntario=$idvoluntario;
        $this->idpessoa=$idpessoa;
        $this->tipo=$tipo;
    }
    public function getIdvoluntario()
    {
        return $this->idvoluntario;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setIdvoluntario($idvoluntario)
    {
        $this->idvoluntario = $idvoluntario;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

}

