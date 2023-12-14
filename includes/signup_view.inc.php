<?php
//task:show to the website
 declare(strict_types = 1);

function signup_inputs(){

    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])){ //if user typed username and it is not taken username 
        echo ' <input type="text" name="username" placeholder="username" value="' . $_SESSION["signup_data"]["username"] . '">';
    }else { 
        echo '<input type="text" name="username" placeholder="username">';
    }
    echo '<input type="password" name="pwd" placeholder="password">'; //we want to users to type pwd again and again to be sure that it is what they intended to set as

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])){ 
        echo ' <input type="text" name="email" placeholder="email" value="' . $_SESSION["signup_data"]["email"] . '">';
    }else { 
        echo '<input type="text" name="email" placeholder="email">';
    }
}

 function check_signup_errors(){
    if (isset($_SESSION['errors_signup'])){
        $errors= $_SESSION['errors_signup'];

        echo "<br>";

        foreach($errors as $error){
            echo '<p>' . $error . '</p>';
        }
        
        unset($_SESSION['errors_signup']);
    }else if ( isset($_GET["signup"]) && $_GET["signup"] === "success") {   //$_GET to get any sort of data displayed in url
    echo '<br>';
    echo '<p> Signing up Success!</p>';
 }
 }
