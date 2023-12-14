<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email)){  //this function is from signup_contr.inc.php if  these are empty
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "username already taken!";
        }
        if (is_email_registered($pdo, $email)){
            $errors["email_used"] = "email already registered!";
        }

        require_once "config_session.inc.php"; //start session in a secure way

        if($errors){
            $_SESSION['errors_signup'] = $errors;

            $signupData = [ //seding the user's input to index.php to try again. so the user do not need to input everything all over again,, but not pwd so user can retype to make sure it is the wanted pwd
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData; //sendind sinupupData as session variable

            header('Location: ../index.php');
            die();
        }
        create_user($pdo, $username, $pwd, $email);
        header('Location: ../index.php?signup=success'); //sending user back to index.php page but with signup=success message

        $pdo=null;
        $stmt=null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header('Location: ../index.php');
    die();
}

