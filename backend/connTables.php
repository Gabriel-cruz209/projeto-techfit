<?php
namespace projetoTechfit;
require_once "connection.php";
use PDO;
class ConnTables {
    private $conn;
    private String $table;
    public function __construct(String $table)
    {  
        $this->conn = Connection::getInstancia();
        $this->table = $table;
    }
    public function select(){
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($whereField,$whereValue, array $tableFields){
        $set = implode(", ", array_map(fn($dado) => "$dado = :$dado", array_keys($tableFields)));
        $tableFields['whereValue'] = $whereValue;
        
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET $set WHERE $whereField = :whereValue");
        $stmt->execute($tableFields);
    }
    public function insert(array $tableFields){
        $fields = implode(",", array_keys($tableFields));
        $placeholders = ":" . implode(",:", array_keys($tableFields));
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} $fields VALUES $placeholders");
        $stmt->execute();
    }
}
?>