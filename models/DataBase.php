<?php 
    class BaseDatos {

        const server = "localhost";
        const userBd = "root";
        const pass = "";
        const dbName = "votacion";

        public static function Conect() {
            try {                               
                $con = new PDO("mysql:host=".self::server.";dbname=".self::dbName.";chartset=utf8",self::userBd, self::pass);
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);                
                return $con;
            } catch (PDOException  $th) {
                return "Fallo ".$th->getMessage();
            }
        }
    }

?>