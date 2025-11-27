<?php
namespace projetoTechfit;
use PDO;
use PDOException;
class Connection {
    private static $instancia = null;

    public static function getInstancia() {
        if(!self::$instancia) {
            try {
                $host = "localhost";
                $user = "root";
                $db = "techfit_academy";
                $password = "senaisp";


                $dns_server = "mysql:host=$host;dbname=$db;charset=utf8";

                self::$instancia = new PDO(
                    $dns_server,
                    $user,
                    $password
                );

                self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                

            }
            catch(PDOException $e) {
                die("ERROR: ". $e->getMessage());
            }
            
        }
        return self::$instancia;
    }
}




?>