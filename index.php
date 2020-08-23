<?php
session_start();

define('HOME_FOLDER','');


if(isset($_GET['login'])){

}else{
    require "pages/header.php";
    if(empty($_GET) || isset($_GET['home'])){
        include "pages/home.php";
    }

    require "pages/footer.php";
}