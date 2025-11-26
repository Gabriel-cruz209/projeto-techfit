<?php
namespace projetoTechfit;
require_once "connTables.php";
require_once "valorTable.php";

$conn = new ConnTables("comunicados");

$resultado = $conn->select();

?>
