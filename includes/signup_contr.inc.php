<?php
//task: take user data and do something

 declare(strict_types=1);

 function is_input_empty(string $username, string $pwd, string $email){
    if(empty($username) || empty($pwd) || empty($email)){ //if username is empty or pwd is empty or email is empty
        return true;
    } else{
        return false;
    }
 }

 function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){   //FILTER_VALIDATE_EMAIL is built in email validation
        return true; //it is invalid email
    } else{
        return false; // it is valid email
    }
 }

 function is_username_taken(object $pdo, string $username){  //to see if the username is taken, we need to query database... so model page time!
    if(get_username($pdo, $username)){  
        return true;  //it is an error if the username is taken
    } else{
        return false;  //it is not an erro if the username is not taken
    }
 }

 function is_email_registered(object $pdo, string $email){ 
    if(get_email($pdo, $email)){  
        return true;  //it is an error if the email is taken
    } else{
        return false; 
    }
 }

 function create_user(object $pdo, string $username, string $pwd, string $email){ 
  set_user($pdo, $username,  $pwd, $email);
 }