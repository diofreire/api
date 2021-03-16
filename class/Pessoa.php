<?php

/**
 * Class Pessoa.
 *
 * @author  Diogo Freire
 */
class Pessoa
{
    
    // Connection
    private $conn;

    // Table
    private $db_table = "pessoa";
        
    protected $id;
    protected $idade;
    protected $nome;
    protected $cpf;
    protected $endereco;
    protected $divida;

    /**
     * Pessoa constructor.
     *
     * @throws Exception
     */
    public function __construct($db){
        $this->conn = $db;
    }
    
    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int|null $id
     *
     * @return Pessoa
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdade()
    {
        return $this->idade;
    }
    
    /**
     * @param int|null $idade
     *
     * @return Pessoa
     */
    public function setIdade($idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     *
     * @return Pessoa
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     *
     * @return Pessoa
     */
    public function setCpf($cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string|null $endereco
     *
     * @return Pessoa
     */
    public function setEndereco($endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }
        
    /**
     * @param Divida|null $divida
     *
     * @return Divida
     */
    public function setDivida($divida): self
    {
        $this->divida = $divida;

        return $this;
    }

    /**
     * @return Divida|null
     */
    public function getDivida()
    {
        return $this->divida;
    }
    
    // GET ALL
    public function getPessoas() 
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    
    // CREATE
    public function create(){
        $sqlQuery = "INSERT INTO
                    ". $this->db_table ."
                SET
                    nome = :name, 
                    cpf = :cpf, 
                    idade = :age, 
                    endereco = :endereco,
                    divida_id = :divida,
                    dataCadastro = :created";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $date = new DateTime('NOW');

        $stmt->bindValue(":name", $this->getNome());
        $stmt->bindValue(":cpf", $this->getCpf());
        $stmt->bindValue(":age", $this->getIdade());
        $stmt->bindValue(":endereco", $this->getEndereco());
        $stmt->bindValue(":divida", $this->getDivida());
        $stmt->bindValue(":created", $date->format('Y-m-d H:m:s'));

        if($stmt->execute()){
           return true;
        }
        return false;
    }

    // READ single
    public function getOnly(){
        $sqlQuery = "SELECT *
                  FROM
                    pessoa
                WHERE 
                   idPessoa = :id
                LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindValue(":id", $this->getId());

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verifica se há resultado. 
        if(!$dataRow){
           return false;
        } else {
            return $dataRow;
        }
        
    }        

    // UPDATE
    public function update(){
        $sqlQuery = "UPDATE
                    ". $this->db_table ."
                SET
                    nome = :name, 
                    cpf = :cpf, 
                    idade = :age, 
                    divida_id = :divida_id,
                    endereco = :endereco
                WHERE 
                    idPessoa = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindValue(":name", $this->getNome());
        $stmt->bindValue(":cpf", $this->getCpf());
        $stmt->bindValue(":age", $this->getIdade());
        $stmt->bindValue(":endereco", $this->getEndereco());
        $stmt->bindValue(":divida_id", $this->getDivida());
        $stmt->bindValue(":id", $this->getId());

        if($stmt->execute()){
           return true;
        }
        return false;
    }

    // DELETE
    public function delete(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idPessoa = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindValue(1, $this->getId());

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    
}
?>