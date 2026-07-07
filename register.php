<?php
include "db/connection.php";

$message = "";

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already exists!";
    }
    else
    {
        $sql = "INSERT INTO users(name,email,password)
                VALUES('$name','$email','$password')";

        if(mysqli_query($conn,$sql))
        {
            $message = "Registration Successful!";
        }
        else
        {
            $message = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link rel="stylesheet" href="style.css">

<style>

body{
font-family:Arial;
background:#f4f4f4;
}

.container{

width:400px;

margin:60px auto;

background:white;

padding:25px;

border-radius:10px;

box-shadow:0 0 10px #ccc;

}

input{

width:100%;

padding:10px;

margin:10px 0;

}

button{

width:100%;

padding:12px;

background:#007bff;

color:white;

border:none;

cursor:pointer;

}

p{

color:green;

}

</style>

</head>

<body>

<div class="container">

<h2>User Registration</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<input
type="text"
name="name"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="register">

Register

</button>

</form>

<br>

<a href="login.php">

Already have an account?

Login

</a>

</div>

</body>

</html>