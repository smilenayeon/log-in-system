<?php
if($_SERVER["REQUEST)_METHOD" === "POST"]){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        if(is_input_empty($username, $pwd, $email)){  //this function is from signup_contr.inc.php if  these are empty

        }

        if(is_email_invalid($email)){

        }
        if(is_username_taken($pdo,$username)){
            
        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header('location:../index.php');
    die();
}

