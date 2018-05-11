<?php

class Internos extends \Pessoa
{
    private $contato_urgente;
    private $nome_mae;
    private $nome_pai;
    private $data_internacao;
    private $data_saida;
    private $readmicao;
    private $data_obito;
    private $estado_civil;
    public function __construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo,$contato_urgente,$nome_mae,$nome_pai,$data_internacao,$data_saida,$readmicao,$data_obito,$estado_civil)
    {
        parent::__construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->contato_urgente=$contato_urgente;
        $this->nome_mae=$nome_mae;
        $this->nome_pai=$nome_pai;
        $this->data_internacao=$data_internacao;
        $this->data_saida=$data_saida;
        $this->readmicao=$readmicao;
        $this->data_obito=$data_obito;
        $this->estado_civil=$estado_civil;
    }
    public function getContato_urgente()
    {
        return $this->contato_urgente;
    }

    public function getNome_mae()
    {
        return $this->nome_mae;
    }

    public function getNome_pai()
    {
        return $this->nome_pai;
    }

    public function getData_internacao()
    {
        return $this->data_internacao;
    }

    public function getData_saida()
    {
        return $this->data_saida;
    }

    public function getReadmicao()
    {
        return $this->readmicao;
    }

    public function getData_obito()
    {
        return $this->data_obito;
    }

    public function getEstado_civil()
    {
        return $this->estado_civil;
    }

    public function setContato_urgente($contato_urgente)
    {
        $this->contato_urgente = $contato_urgente;
    }

    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;
    }

    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;
    }

    public function setData_internacao($data_internacao)
    {
        $this->data_internacao = $data_internacao;
    }

    public function setData_saida($data_saida)
    {
        $this->data_saida = $data_saida;
    }

    public function setReadmicao($readmicao)
    {
        $this->readmicao = $readmicao;
    }

    public function setData_obito($data_obito)
    {
        $this->data_obito = $data_obito;
    }

    public function setEstado_civil($estado_civil)
    {
        $this->estado_civil = $estado_civil;
    }

}

