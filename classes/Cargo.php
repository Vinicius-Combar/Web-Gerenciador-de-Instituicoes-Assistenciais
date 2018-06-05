<?php

require_once('acesso.php');
require_once ('Funcionario.php');

class Cargo extends Funcionario
{
    private $idcargo;
    private $descricao;
    
    public function __construct($idcargo, $descricao)
    {
        $this->idcargo=$idcargo;
        $this->descricao=$descricao;
    }

    public function getIdcargo()
    {
        return $this->idcargo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setIdcargo($idcargo)
    {
        $this->idcargo = $idcargo;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


//Insert
    public function incluir($idcargo, $descricao, $carga_horaria) {
        try {
            $sql = 'INSERT cargo (idcargo, descricao, ) VALUES (:idcargo, :descricao, )';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idcargo', $idcargo);
            $stmt->bindParam(':descricao', $descricao);


            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    //excluir
    public function excluir($idcargo) {
        try {
            $sql = 'DELETE from cargo WHERE idcargo = :idcargo';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();


            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idcargo', $idcargo);

            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    //Editar
    public function alterar($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo, $senha) {
        try {
            $sql = 'update pessoas set idpessoa=:idpessoa,nome=:nome, telefone=:telefone, data_nascimento=:data_nascimento, cpf=:cpf, sexo=:sexo, senha=:senha';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();


            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idpessoa', $idpessoa);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: <b>  na tabela pessoas = ' . $sql . '</b> <br /><br />' . $e->getMessage();
        }
    }

    public function consultar($sql) {
        $acesso = new Acesso();
        $acesso->conexao();
        $acesso->query($sql);
        $this->Linha = $acesso->linha;
        $this->Result = $acesso->result;
    }
    
}

