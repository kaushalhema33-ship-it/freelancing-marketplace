<?php
include "db/connection.php";

$sql = "SELECT * FROM freelancers ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Freelancers | FreelanceHub</title>

<link rel="stylesheet" href="style.css">

<style>

body{
font-family:Arial,sans-serif;
background:#f4f4f4;
margin:0;
}

header{
background:#007bff;
padding:15px;
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
color:white;
}

.nav-links{
display:flex;
gap:20px;
list-style:none;
}

.nav-links a{
color:white;
text-decoration:none;
font-weight:bold;
}

.container{
width:90%;
margin:40px auto;
}

.container h2{
text-align:center;
margin-bottom:30px;
}

.freelancer-container{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:25px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 5px 10px rgba(0,0,0,.1);
text-align:center;
}

.card img{
width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
margin-bottom:15px;
}

.card h3{
color:#007bff;
}

.btn{
display:inline-block;
margin-top:15px;
padding:10px 20px;
background:#007bff;
color:white;
text-decoration:none;
border-radius:5px;
}

footer{
background:#222;
color:white;
padding:20px;
margin-top:40px;
text-align:center;
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
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="proposal.php">Proposal</a></li>

</ul>

</nav>

</header>

<div class="container">

<h2>Our Freelancers</h2>

<div class="freelancer-container">

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="card">

<img src="images/<?php echo $row['image']; ?>">

<h3><?php echo $row['name']; ?></h3>

<p><strong>Skills:</strong><br>
<?php echo $row['skills']; ?>
</p>

<p><strong>Experience:</strong>
<?php echo $row['experience']; ?>
</p>

<p><strong>Rating:</strong>
⭐ <?php echo $row['rating']; ?>/5
</p>

<a href="proposal.php" class="btn">
Hire Freelancer
</a>

</div>

<?php

}

}
else
{

echo "<h2>No Freelancers Found</h2>";

}

?>

</div>

</div>

<footer>

<h3>FreelanceHub</h3>

<p>Hire Top Freelancers for Your Business</p>

<p>© 2026 FreelanceHub. All Rights Reserved.</p>

</footer>

</body>
</html>