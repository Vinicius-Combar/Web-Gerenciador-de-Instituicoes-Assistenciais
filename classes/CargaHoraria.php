<?php
class Cargahoraria extends Funcionario
{
    private $idfuncionario;
    private $tipo;
    private $carga_mensal;
    private $primeira_entrada;
    private $primeira_saida;
    private $segunda_entrada;
    private $segunda_saida;
    private $carga_diaria;
    private $dias_trabalhados;
    private $folgas;
    public function __construct($idfuncionario,$tipo,$carga_mensal,$primeira_entrada,$primeira_saida,$segunda_entrada,$segunda_saida,$carga_diaria,$dias_trabalhados,$folgas)
    {
        $this->idfuncionario=$idfuncionario;
        $this->tipo=$tipo;
        $this->carga_mensal=$carga_mensal;
        $this->primeira_entrada=$primeira_entrada;
        $this->primeira_saida=$primeira_saida;
        $this->segunda_entrada=$segunda_entrada;
        $this->segunda_saida=$segunda_saida;
        $this->carga_diaria=$carga_diaria;
        $this->folgas=$folgas;
    }
    public function getIdfuncionario()
    {
        return $this->idfuncionario;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getCarga_mensal()
    {
        return $this->carga_mensal;
    }

    public function getPrimeira_entrada()
    {
        return $this->primeira_entrada;
    }

    public function getPrimeira_saida()
    {
        return $this->primeira_saida;
    }

    public function getSegunda_entrada()
    {
        return $this->segunda_entrada;
    }

    public function getSegunda_saida()
    {
        return $this->segunda_saida;
    }

    public function getCarga_diaria()
    {
        return $this->carga_diaria;
    }

    public function getDias_trabalhados()
    {
        return $this->dias_trabalhados;
    }

    public function getFolgas()
    {
        return $this->folgas;
    }

    public function setIdfuncionario($idfuncionario)
    {
        $this->idfuncionario = $idfuncionario;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setCarga_mensal($carga_mensal)
    {
        $this->carga_mensal = $carga_mensal;
    }

    public function setPrimeira_entrada($primeira_entrada)
    {
        $this->primeira_entrada = $primeira_entrada;
    }

    public function setPrimeira_saida($primeira_saida)
    {
        $this->primeira_saida = $primeira_saida;
    }

    public function setSegunda_entrada($segunda_entrada)
    {
        $this->segunda_entrada = $segunda_entrada;
    }

    public function setSegunda_saida($segunda_saida)
    {
        $this->segunda_saida = $segunda_saida;
    }

    public function setCarga_diaria($carga_diaria)
    {
        $this->carga_diaria = $carga_diaria;
    }

    public function setDias_trabalhados($dias_trabalhados)
    {
        $this->dias_trabalhados = $dias_trabalhados;
    }

    public function setFolgas($folgas)
    {
        $this->folgas = $folgas;
    }
  
    //Insert
    public function incluir($idfuncionario,$tipo,$carga_mensal,$primeira_entrada,$primeira_saida,$segunda_entrada,$segunda_saida,$carga_diaria,$dias_trabalhados,$folgas) {
        try {
            $sql = 'INSERT cargo (idfuncionario, tipo, carga_mensal, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, carga_diaria,dias_trabalhados,folgas) VALUES (:idfuncionario, :tipo, :carga_mensal, :primeira_entrada, :primeira_saida, :segunda_entrada, :segunda_saida, :carga_diaria, :dias_trabalhados, :folgas)';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            $pdo = $acesso->conexao();
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':carga_mensal', $carga_mensal);
            $stmt->bindParam(':primeira_entrada', $primeira_entrada);
            $stmt->bindParam(':primeira_saida', $primeira_saida);
            $stmt->bindParam(':segunda_entrada', $primeira_entrada);
            $stmt->bindParam(':segunda_saida', $segunda_saida);
            $stmt->bindParam(':carga_diaria', $carga_diaria);
            $stmt->bindParam(':dias_trabalhados', $dias_trabalhados);
            $stmt->bindParam(':folgas', $folgas);
            
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
    public function alterar($idfuncionario,$tipo,$carga_mensal,$primeira_entrada,$primeira_saida,$segunda_entrada,$segunda_saida,$carga_diaria,$dias_trabalhados,$folgas) {
        try {
            $sql = 'update pessoas set idfuncionario=:idfuncionario,tipo=:tipo, carga_mensal=:carga_mensal, primeira_entrada=:primeira_entrada, primeira_saida=:primeira_saida, segunda_entrada=:segunda_entrada, segunda_saida=:segunda_saida,carga_diaria=:carga_diaria,dias_trabalhados=:dias_trabalhados,folgas=:folgas';
            $sql = str_replace("'", "\'", $sql);
            $acesso = new Acesso();
            
            
            $pdo = $acesso->conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':idfuncionario', $idfuncionario);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':carga_mensal', $carga_mensal);
            $stmt->bindParam(':primeira_entrada', $primeira_entrada);
            $stmt->bindParam(':primeira_saida', $primeira_saida);
            $stmt->bindParam(':segunda_entrada', $primeira_entrada);
            $stmt->bindParam(':segunda_saida', $segunda_saida);
            $stmt->bindParam(':carga_diaria', $carga_diaria);
            $stmt->bindParam(':dias_trabalhados', $dias_trabalhados);
            $stmt->bindParam(':folgas', $folgas);
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

