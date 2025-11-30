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
        $tableFields['whereValue'] = $whereValue;
        $filterDates = array_filter($tableFields,fn($dado) => $dado !== null);
        $set = implode(", ", array_map(fn($dado) => "$dado = :$dado", array_keys($filterDates)));
        
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET $set WHERE $whereField = :whereValue");
        $stmt->execute($tableFields);
    }
    public function insert(array $tableFields){
        $filterDates = array_filter($tableFields,fn($dado) => $dado !== null);
        $fields = implode(",", array_keys($filterDates));
        $placeholders = ":" . implode(",:", array_keys($filterDates));
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ( {$placeholders }) ");
        $stmt->execute($filterDates);
    }
    public function delete(array $tableFields, $whereField){
        $filterDates = array_filter($tableFields, fn($dado) => $dado !== null);
        $placeholders = ":" . implode(",:", array_keys($filterDates));
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE $whereField = {$placeholders} ");
        $stmt->execute($filterDates);
    }
    public function selectUnique($column = "",$where = "",$orderBy= "",$groupBy= "", $limit = "",$params = [])
    {
        $sql = "SELECT";
        if($column !== ""){
            $sql .= " {$column}";
        } else {
            $sql .= " *";
        }
        $sql .= " FROM {$this->table}";

        if ($orderBy !== "") {
            $sql .= " ORDER BY {$orderBy}";
        }

        if ($limit !== "") {
            $sql .= " LIMIT {$limit}";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    }    
?>