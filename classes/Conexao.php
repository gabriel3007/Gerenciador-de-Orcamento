<?php 

class Conexao{
    public static function get(){
        $conexao = new PDO(DB_DRIVE.":host=".DB_HOSTNAME.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        return $conexao;
    }
}
