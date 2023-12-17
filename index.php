<?php
require_once 'includes/config_session.inc.php'; //session running to grab the error data from session
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h3>log in</h3>  
<form action="includes/login.inc.php" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="pwd" placeholder="password">
    <button>Log In</button>

</form>
<?php
    check_login_errors();
?>

<h3>sign up</h3>  
<form action="includes/signup.inc.php" method="post">
    <?php
    signup_inputs();
    ?>
    <button>Sign Up</button>

</form>
<?php
 check_signup_errors(); //this is shown on web so this function is in view
?>

<h3>log out</h3>  
<form action="includes/logout.inc.php" method="post">
    <button>Log Out</button>

</form>
</body>
</html>