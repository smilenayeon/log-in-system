<?php
/*task:only interact with database. just querying database. The functions here are very sensative since they interact with out databse.
 so, only our controller file will be allowed to interact with this file*/
 declare(strict_types=1);
  //require_once 'dbh.inc.php'; is unneccesary since it is already required in signup.inc.php
 
  function get_username(object $pdo, string $username){
    $query="SELECT username FROM users WHERE  username = :username;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":username", $username);
    $stmt -> execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); // grab the first result
    return $result;
 }

 function get_email(object $pdo, string $email){
  $query = "SELECT email FROM users WHERE email = :email;";
  $stmt = $pdo -> prepare($query);
  $stmt -> bindParam(":email",$email);
  $stmt -> execute();

  $result = $stmt -> fetch(PDO::FETCH_ASSOC);
  return $result;
 }