<?php
session_start();
use DB_CONNECT as con;

define('HOME_FOLDER','Alhuda1');
define('HOME_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/' . HOME_FOLDER.'/');
require "config/connections.php";
con\Connection::Connect_DB();
if(isset($_GET['login'])){
include "pages/login.php";
}else{
    if(isset($_GET['action'])){
        include "config/action.php";
        exit();
    }
    require "pages/header.php";
    if(empty($_GET) || isset($_GET['home'])){
        include "pages/home.php";
    }else if(isset($_GET['food'])){
        include "pages/services.php";
    }
    require "pages/footer.php";
}