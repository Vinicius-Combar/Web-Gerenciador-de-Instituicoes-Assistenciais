<?php

class Funcionario extends \Pessoa
{  
    private $idfuncionario;
    private $idpessoa;
    private $idcargo;
    private $imagem;
    private $vale_transporte;
    private $data_admissao;
    private $registro_geral;
    private $orgao_emissor;
    private $data_expedicao;
    private $pis;
    private $ctps;
    private $uf_ctps;
    private $zona;
    private $certificado_reservista_numero;
    private $nome_mae;
    private $nome_pai;
    public function __construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo,$idfuncionario,$idpessoa,$idcargo,$imagem,$vale_transporte,$data_admissao,$registro_geral,$orgao_emissor,$data_expedicao,$pis,$ctps,$uf_ctps,$zona,$certificado_reservista_numero,$nome_mae,$nome_pai)
    {
        parent::__construct($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo);
        $this->idfuncionario=$idfuncionario;
        $this->idpessoa=$idpessoa;
        $this->idcargo=$idcargo;
        $this->vale_transporte=$vale_transporte;
        $this->registro_geral=$registro_geral;
        $this->orgao_emissor=$orgao_emissor;
        $this->data_expedicao=$data_expedicao;
        $this->pis=$pis;
        $this->ctps=$ctps;
        $this->uf_ctps=$uf_ctps;
        $this->zona=$zona;
        $this->certificado_reservista_numero=$certificado_reservista_numero;
        $this->nome_mae=$nome_mae;
        $this->nome_pai=$nome_pai;
    }
    public function getIdfuncionario()
    {
        return $this->idfuncionario;
    }

    public function getIdpessoa()
    {
        return $this->idpessoa;
    }

    public function getIdcargo()
    {
        return $this->idcargo;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function getVale_transporte()
    {
        return $this->vale_transporte;
    }

    public function getData_admissao()
    {
        return $this->data_admissao;
    }

    public function getRegistro_geral()
    {
        return $this->registro_geral;
    }

    public function getOrgao_emissor()
    {
        return $this->orgao_emissor;
    }

    public function getData_expedicao()
    {
        return $this->data_expedicao;
    }

    public function getPis()
    {
        return $this->pis;
    }

    public function getCtps()
    {
        return $this->ctps;
    }

    public function getUf_ctps()
    {
        return $this->uf_ctps;
    }

    public function getZona()
    {
        return $this->zona;
    }

    public function getCertificado_reservista_numero()
    {
        return $this->certificado_reservista_numero;
    }

    public function getNome_mae()
    {
        return $this->nome_mae;
    }

    public function getNome_pai()
    {
        return $this->nome_pai;
    }

    public function setIdfuncionario($idfuncionario)
    {
        $this->idfuncionario = $idfuncionario;
    }

    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }

    public function setIdcargo($idcargo)
    {
        $this->idcargo = $idcargo;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function setVale_transporte($vale_transporte)
    {
        $this->vale_transporte = $vale_transporte;
    }

    public function setData_admissao($data_admissao)
    {
        $this->data_admissao = $data_admissao;
    }

    public function setRegistro_geral($registro_geral)
    {
        $this->registro_geral = $registro_geral;
    }

    public function setOrgao_emissor($orgao_emissor)
    {
        $this->orgao_emissor = $orgao_emissor;
    }

    public function setData_expedicao($data_expedicao)
    {
        $this->data_expedicao = $data_expedicao;
    }

    public function setPis($pis)
    {
        $this->pis = $pis;
    }

    public function setCtps($ctps)
    {
        $this->ctps = $ctps;
    }

    public function setUf_ctps($uf_ctps)
    {
        $this->uf_ctps = $uf_ctps;
    }

    public function setZona($zona)
    {
        $this->zona = $zona;
    }

    public function setCertificado_reservista_numero($certificado_reservista_numero)
    {
        $this->certificado_reservista_numero = $certificado_reservista_numero;
    }

    public function setNome_mae($nome_mae)
    {
        $this->nome_mae = $nome_mae;
    }

    public function setNome_pai($nome_pai)
    {
        $this->nome_pai = $nome_pai;
    }

}

