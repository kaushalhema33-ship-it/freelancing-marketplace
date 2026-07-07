<?php
session_start();
include "db/connection.php";

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$project_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM projects"));
$freelancer_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM freelancers"));
$proposal_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM proposals"));

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "User";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard | FreelanceHub</title>

<link rel="stylesheet" href="style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
margin:0;
padding:0;
font-family:Arial,sans-serif;
background:#f4f4f4;
}

header{
background:#007bff;
padding:15px 0;
}

.navbar{
width:90%;
margin:auto;
display:flex;
justify-content:space-between;
align-items:center;
}

.logo{
font-size:28px;
font-weight:bold;
color:#fff;
}

.nav-links{
display:flex;
list-style:none;
gap:20px;
}

.nav-links a{
color:#fff;
text-decoration:none;
font-weight:bold;
}

.dashboard{
width:90%;
margin:40px auto;
}

.dashboard h2{
text-align:center;
margin-bottom:30px;
}

.why-container{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
}

.why-card{
background:#fff;
padding:20px;
border-radius:10px;
box-shadow:0 5px 10px rgba(0,0,0,.1);
text-align:center;
}

.why-card img{
width:100px;
height:100px;
border-radius:50%;
object-fit:cover;
margin-bottom:15px;
}

.why-card h1{
font-size:38px;
color:#007bff;
margin:10px 0;
}

.projects{
width:90%;
margin:40px auto;
}

.projects h2{
text-align:center;
margin-bottom:30px;
}

.project-container{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
gap:20px;
}

.project-card{
background:#fff;
border-radius:10px;
overflow:hidden;
box-shadow:0 5px 10px rgba(0,0,0,.1);
}

.project-card img{
width:100%;
height:180px;
object-fit:cover;
}

.project-content{
padding:20px;
}

footer{
margin-top:40px;
background:#222;
color:white;
}

.footer-container{
display:flex;
justify-content:space-around;
flex-wrap:wrap;
padding:30px;
}

.footer-container h3{
margin-bottom:10px;
}

.footer-container i{
font-size:22px;
margin-right:10px;
}

</style>

</head>

<body>

<header>

<nav class="navbar">

<div class="logo">
FreelanceHub
</div>

<ul class="nav-links">

<li><a href="index.php">Home</a></li>
<li><a href="projects.php">Projects</a></li>
<li><a href="freelancers.php">Freelancers</a></li>
<li><a href="proposal.php">Proposal</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href="about.php">About</a></li>

</ul>

</nav>

</header>

<section class="dashboard">

<h2>Welcome, <?php echo $username; ?></h2>

<div class="why-container">

<div class="why-card">

<img src="images/profile.jpg">

<h3><?php echo $username; ?></h3>

<p>Welcome Back</p>

</div>

<div class="why-card">

<h1><?php echo $project_count; ?></h1>

<h3>Total Projects</h3>

</div>

<div class="why-card">

<h1><?php echo $proposal_count; ?></h1>

<h3>Total Proposals</h3>

</div>

<div class="why-card">

<h1><?php echo $freelancer_count; ?></h1>

<h3>Total Freelancers</h3>

</div>

</div>

</section>

<section class="projects">

<h2>Recent Projects</h2>
<section class="projects">

<h2>Recent Proposals</h2>

<div class="project-container">

<?php

$proposal_result = mysqli_query($conn, "SELECT * FROM proposals ORDER BY id DESC LIMIT 5");

while($proposal = mysqli_fetch_assoc($proposal_result))
{
?>

<div class="project-card">

<h3><?php echo $proposal['freelancer_name']; ?></h3>

<p><strong>Email:</strong> <?php echo $proposal['email']; ?></p>

<p><strong>Phone:</strong> <?php echo $proposal['phone']; ?></p>

<p><strong>Budget:</strong> ₹<?php echo $proposal['budget']; ?></p>

<p><strong>Proposal:</strong><br><?php echo $proposal['proposal']; ?></p>

</div>

<?php
}
?>

</div>

</section>

<div class="project-container">

<?php

$result=mysqli_query($conn,"SELECT * FROM projects ORDER BY id DESC LIMIT 3");

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="project-card">

<img src="images/hero.jpg">

<div class="project-content">

<h3><?php echo $row['title']; ?></h3>

<p><strong>Category:</strong> <?php echo $row['category']; ?></p>

<p><strong>Budget:</strong> ₹<?php echo $row['budget']; ?></p>

<p><strong>Deadline:</strong> <?php echo $row['deadline']; ?></p>

<p><strong>Client:</strong> <?php echo $row['client_name']; ?></p>

</div>

</div>

<?php
}
?>

</div>

</section>

<footer>

<div class="footer-container">

<div>

<h3>FreelanceHub</h3>

<p>Hire the Best Freelancers.</p>

</div>

<div>

<h3>Contact</h3>

<p>Email: support@freelancehub.com</p>

<p>Phone: +91 9876543210</p>

</div>

<div>

<h3>Follow Us</h3>

<i class="fab fa-facebook"></i>
<i class="fab fa-instagram"></i>
<i class="fab fa-linkedin"></i>
<i class="fab fa-twitter"></i>

</div>

</div>

<hr>

<p style="text-align:center;padding:15px;margin:0;">
© 2026 FreelanceHub. All Rights Reserved.
</p>

</footer>

</body>
</html>