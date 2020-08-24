<?php

use DB_CONNECT\Connection;


if(!isset($_SESSION['cart']) || isset($_GET['clearBasket'])){
    $_SESSION['cart'] = array();
}
if(isset($_GET['loginCheck'])){
    if(isset($_POST['username']) && isset($_POST['pass'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $db = DB_CONNECT\Connection::getInstance();
       $data = $db->prepare("SELECT * FROM `users` WHERE `username`=? && `password`=?");
       $data->execute(array($username,$pass));
       $all = $data->fetchAll(PDO::FETCH_ASSOC);
       if(empty($all)){
           echo '0';
       }else {
           $_SESSION['username_session'] = $username;
           echo '1';
       }
    }
}else if(isset($_GET['logout'])){
    $_SESSION['username_session'] ='';
    unset($_SESSION['username_session']);
} else if(isset($_GET['addItem'])){
    if(
        isset($_POST['name'])
        && isset($_POST['price'])
        && isset($_POST['item_type'])
        && isset($_POST['about'])
        && isset($_FILES['photo'])
    ){
        $file = $_FILES['photo'];
        $file_tmp = $file['tmp_name'];
        $file_name = $file['name'];
        $upload_folder = 'images/upload_files';
        if(move_uploaded_file($file_tmp,$upload_folder.'/'.$file_name)){
            $db = DB_CONNECT\Connection::getInstance();
            $data = $db->prepare("INSERT INTO `items` (name,price,item_type,about,photo) VALUES  (?,?,?,?,?)");
            $data->execute(array($_POST['name'],$_POST['price'],$_POST['item_type'],$_POST['about'],$file_name));
            echo 'added<br>
            <a href="javascript:;" onclick=" window.history.back();">Go Back</a>
            ';
        }else{
            echo 'error upload';
        }
    }
}else if(isset($_GET['addToCart']) && isset($_GET['id'])){
    $id = intval($_GET['id']);
    $_SESSION['cart'][] = $id;
}
