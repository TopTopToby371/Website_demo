<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require('db.php');

if (isset($_REQUEST['username'])) {
    $first = stripslashes($_REQUEST['first_name']);
    $first = mysqli_real_escape_string($con, $first_name);

    $last = stripslashes($_REQUEST['lastname']);
    $last = mysqli_real_escape_string($con, $lastname);

    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $trn_date = date("Y-m-d H:1:s");

    $query = "INSERT into `users` (first_name, lastname, username, password, email, create_datetime)
                VALUES ('first_name', 'lastname', '$username', '".md5($password)."', '$email', '$trn_date')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a>
        </div>";
    } else {
        echo "<div class='form'>
        <h3>Required fields are missing.</h3>
        <br/>Click here to <a href='registration.php'>Registration</a>
        </div>";
    }
} else {

?>

<form action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="first name" placeholder="First name" required>
        <input type="text" class="login-input" name="last name" placeholder="Last name" required>
        <input type="text" class="login-input" name="username" placeholder="Username" required>
        <input type="email" class="login-input" name="email" placeholder="Email" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit"  name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>

    <?php
}
?>
    
</body>
</html>