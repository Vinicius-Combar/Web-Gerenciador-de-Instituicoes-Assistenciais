<?php

abstract class Pessoa
{
    protected $idpessoa;
    protected $nome;
    protected $telefone;
    protected $data_nascimento;
    protected $cpf;
    protected $sexo;
    public function __construct($idpessoa,$nome,$telefone,$data_nascimento,$cpf,$sexo)
    {
        $this->idpessoa=$idpessoa;
        $this->nome=$nome;
        $this->telefone=$telefone;
        $this->data_nascimento=$data_nascimento;
        $this->cpf=$cpf;
        $this->sexo=$sexo;
    }
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    
}

