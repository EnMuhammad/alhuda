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
}else if(isset($_GET['place_order'])){
    if(
        isset($_POST['c_fname'])
        && isset($_POST['c_lname'])
        && isset($_POST['c_address'])
        && isset($_POST['c_address_2'])
        && isset($_POST['c_state_country'])
        && isset($_POST['c_postal_zip'])
        && isset($_POST['c_order_notes'])
    ){
            $db = DB_CONNECT\Connection::getInstance();
            $data = $db->prepare("INSERT INTO `orders` (full_name,address,country,zip,notes,products) VALUES  (?,?,?,?,?,?)");
            $data->execute(array(
                $_POST['c_fname'].' '.$_POST['c_lname'],
                $_POST['c_address'].' '.$_POST['c_address_2'],
                $_POST['c_state_country'],
                $_POST['c_postal_zip'],
                $_POST['c_order_notes'],
                json_encode($_SESSION['cart'])
                )
            );
            $_SESSION['cart'] = array();
            echo 'Thank You for Placing order<br>
            <a href="'.HOME_URL.'" >Go Home</a>
            ';
    }
} else if(isset($_GET['addToCart']) && isset($_GET['id'])){
    $id = intval($_GET['id']);
    $_SESSION['cart'][] = $id;
}
