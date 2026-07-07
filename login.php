<?php
session_start();
include "db/connection.php";

$message = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password']))
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            $message = "Invalid Password!";
        }
    }
    else
    {
        $message = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | FreelanceHub</title>

<link rel="stylesheet" href="style.css">

<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f4f4;
}
.container{
    width:400px;
    margin:70px auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    box-sizing:border-box;
}
button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:#fff;
    border:none;
    cursor:pointer;
}
.error{
    color:red;
    text-align:center;
}
</style>
</head>

<body>

<div class="container">

<h2>User Login</h2>

<p class="error"><?php echo $message; ?></p>

<form method="POST">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="login">Login</button>

</form>

<br>

<center>
<a href="register.php">Create New Account</a>
</center>

</div>

</body>
</html>