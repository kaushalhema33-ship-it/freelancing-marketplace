<?php
include "db/connection.php";

if (!isset($_GET['id'])) {
    die("Project ID not found.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM projects WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Project not found.");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Project Details</title>

<link rel="stylesheet" href="style.css">

<style>

.container{
    width:80%;
    margin:40px auto;
}

.card{
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.card h2{
    color:#007bff;
    margin-bottom:20px;
}

.card p{
    margin:10px 0;
    font-size:18px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 20px;
    background:#007bff;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.btn:hover{
    background:#0056b3;
}

</style>

</head>

<body>

<header>

<nav class="navbar">

<div class="logo">FreelanceHub</div>

<ul class="nav-links">
<li><a href="index.php">Home</a></li>
<li><a href="projects.php">Projects</a></li>
<li><a href="freelancers.php">Freelancers</a></li>
<li><a href="proposal.php">Proposal</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
</ul>

</nav>

</header>

<div class="container">

<div class="card">

<h2><?php echo $row['title']; ?></h2>

<p><strong>Category:</strong> <?php echo $row['category']; ?></p>

<p><strong>Budget:</strong> ₹<?php echo $row['budget']; ?></p>

<p><strong>Description:</strong><br>
<?php echo $row['description']; ?>
</p>

<p><strong>Skills:</strong> <?php echo $row['skills']; ?></p>

<p><strong>Deadline:</strong> <?php echo $row['deadline']; ?></p>

<p><strong>Client:</strong> <?php echo $row['client_name']; ?></p>

<a href="proposal.php" class="btn">
Apply Now
</a>

<a href="projects.php" class="btn">
Back
</a>

</div>

</div>

</body>
</html>