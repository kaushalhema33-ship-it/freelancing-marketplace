<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "User";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "Not Available";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

<link rel="stylesheet" href="style.css">

<style>

.container{
width:500px;
margin:50px auto;
background:#fff;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);
text-align:center;
}

.profile-img{
width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
margin-bottom:20px;
}

.info{
font-size:18px;
margin:15px 0;
}

.btn{
display:inline-block;
padding:10px 20px;
background:#007bff;
color:white;
text-decoration:none;
border-radius:5px;
margin-top:20px;
}

</style>

</head>

<body>

<div class="container">

<img src="images/profile.jpg" class="profile-img" alt="Profile">

<h2>My Profile</h2>

<div class="info">
<strong>Username:</strong>
<?php echo $username; ?>
</div>

<div class="info">
<strong>Email:</strong>
<?php echo $email; ?>
</div>

<div class="info">
<strong>User ID:</strong>
<?php echo $_SESSION['user_id']; ?>
</div>

<a href="dashboard.php" class="btn">
Back to Dashboard
</a>

</div>

</body>
</html>