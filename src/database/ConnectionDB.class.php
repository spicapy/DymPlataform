<?php
//Desenvolvido por Lucas Vieira
class ConnectionBD extends PDO
{
    private static $instance = null;

    public function __construct($dataSourceName, $user, $password)
    {
        parent::__construct($dataSourceName, $user, $password);
    }

    public static function getInstance()
    {
        try{
            if(!isset(self::$instance)) {
                self::$instance = new ConnectionBD("mysql:dbname=id16225300_bd_dym;host=localhost","id16225300_user","Q?z8!#h]gKx73H{8");
            }
            return self::$instance;
        } catch(PDOException $error) {
            echo "Problema ao se Conectar no Banco!".$error;
        }
    }
}