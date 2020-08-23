<?php
namespace DB_CONNECT;
DEFINE('HOST', 'localhost');
DEFINE('DB_NAME', 'alhuda');
DEFINE('USERNAME', 'root');
DEFINE('PASSWORD', 'allahw');

use PDO as pdo;
class Connection {
    static $error = '';
    static private $host = HOST;
    static private $db_name = DB_NAME;
    static private $username = USERNAME;
    static private $password = PASSWORD;
    private static $instance = NULL;
public static function Connect_DB(){
        if (!isset(self::$instance)) {
            self::$instance =  new pdo('mysql:host=' . self::$host . ';dbname=' . self::$db_name, self::$username, self::$password,
                array(
                    pdo::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
//                    pdo::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
                ));
            self::$instance->exec('set names utf8');
        }
        if (self::$instance) {
            return self::$instance;
        } else {
            self::$error = 'Our database is down, Please try again later ..';
            return self::$error;
        }
    }
    static public function getInstance()
    {
        try {
            return Connection::Connect_DB();
        } catch (PDOException $e) {
            echo 'Our database is down, Please try again later ..';
        }
    }
}