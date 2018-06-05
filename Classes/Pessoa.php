<?php

require_once('acesso.php');

abstract class Pessoa
{
    protected $idpessoa;
    protected $nome;
    protected $telefone;
    protected $data_nascimento;
    protected $cpf;
    protected $email;
    protected $senha;
    protected $cep;
    protected $cidade;
    protected $bairro;
    protected $ibge;
    protected $rua;
    protected $numero_endereco;
    protected $complemento;
    
    public function __construct($idpessoa,$nome,$telefone,$data_nascimento,$cpf,$senha)
    {
        $this->idpessoa=$idpessoa;
        $this->nome=$nome;
        $this->telefone=$telefone;
        $this->data_nascimento=$data_nascimento;
        $this->cpf=$cpf;
        $this->senha=$senha;
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
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
     public function getSenha()
    {
        return $this->senha;
    }

//Insert
    public function incluir($idpessoa, $nome, $telefone, $data_nascimento, $cpf, $sexo, $senha) {
        try {
            $sql = 'INSERT pessoa (idpessoa, nome, telefone, data_nascimento, cpf, sexo, senha) VALUES (:idpessoa, :nome, :telefone, :data_nascimento, :cpf, :sexo, :senha)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();

            $pdo = $acesso->conexao();

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

    //excluir
    public function excluir($idpessoa) {
        try {
            $sql = 'DELETE from pessoa WHERE idpessoa = :idpessoa';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();


            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idpessoa', $idpessoa);

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

