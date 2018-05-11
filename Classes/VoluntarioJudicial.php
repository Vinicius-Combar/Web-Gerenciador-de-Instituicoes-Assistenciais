<?php
require_once 'Pessoa.php';
class VoluntarioJudicial extends \Pessoa
{
    private $idvoluntario_judicial;
    private $documento_judicial;
    private $encarregado_judicial;
    public function __construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo,$idvoluntario_judicial,$documento_judicial,$encarregado_judicial)
    {
        parent::__construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->idvoluntario_judicial=$idvoluntario_judicial;
        $this->documento_judicial=$documento_judicial;
        $this->encarregado_judicial=$encarregado_judicial;
    }
    public function getIdvoluntario_judicial()
    {
        return $this->idvoluntario_judicial;
    }

    public function getDocumento_judicial()
    {
        return $this->documento_judicial;
    }

    public function getEncarregado_judicial()
    {
        return $this->encarregado_judicial;
    }

    public function setIdvoluntario_judicial($idvoluntario_judicial)
    {
        $this->idvoluntario_judicial = $idvoluntario_judicial;
    }

    public function setDocumento_judicial($documento_judicial)
    {
        $this->documento_judicial = $documento_judicial;
    }

    public function setEncarregado_judicial($encarregado_judicial)
    {
        $this->encarregado_judicial = $encarregado_judicial;
    }

    
}