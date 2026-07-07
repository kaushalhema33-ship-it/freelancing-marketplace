<?php
include "db/connection.php";

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, trim($_GET['search'])) : "";
$category = isset($_GET['category']) ? mysqli_real_escape_string($conn, trim($_GET['category'])) : "";

$sql = "SELECT * FROM projects WHERE 1";

if($search != "")
{
    $sql .= " AND title LIKE '%$search%'";
}

if($category != "")
{
    $sql .= " AND category='$category'";
}

$sql .= " ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

if(!$result)
{
    die("SQL Error : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Projects | FreelanceHub</title>

<link rel="stylesheet" href="style.css">

<style>

body{
font-family:Arial,sans-serif;
background:#f4f4f4;
margin:0;
padding:0;
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
color:white;
font-weight:bold;
}

.nav-links{
list-style:none;
display:flex;
gap:20px;
}

.nav-links a{
color:white;
text-decoration:none;
font-weight:bold;
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
grid-template-columns:repeat(auto-fit,minmax(330px,1fr));
gap:25px;
}

.project-card{

background:white;

padding:20px;

border-radius:10px;

box-shadow:0 5px 10px rgba(0,0,0,.1);

}

.project-card h3{

color:#007bff;

}

.project-card p{

margin:8px 0;

}

.btn{

display:inline-block;

padding:10px 18px;

margin-top:10px;

margin-right:8px;

text-decoration:none;

border-radius:5px;

color:white;

}

.view{

background:#007bff;

}

.edit{

background:green;

}

.delete{

background:red;

}

footer{

background:#222;

color:white;

padding:30px;

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

<li><a href="proposal.php">Proposal</a></li>

<li><a href="dashboard.php">Dashboard</a></li>

<li><a href="add_project.php">Add Project</a></li>

<li><a href="logout.php">Logout</a></li>

</ul>

</nav>

</header>

<section class="projects">
    <form method="GET" style="text-align:center; margin:20px 0;">

    <input type="text"
           name="search"
           placeholder="Search by Project Title"
           style="padding:10px; width:250px;">

    <select name="category" style="padding:10px;">
        <option value="">All Categories</option>
        <option value="Web Development">Web Development</option>
        <option value="App Development">App Development</option>
        <option value="Graphic Design">Graphic Design</option>
        <option value="Content Writing">Content Writing</option>
    </select>

    <button type="submit" class="btn view">Search</button>

</form>

<h2>Available Projects</h2>

<div class="project-container">

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="project-card">

<h3><?php echo $row['title']; ?></h3>

<p><b>Category :</b> <?php echo $row['category']; ?></p>

<p><b>Budget :</b> ₹<?php echo $row['budget']; ?></p>

<p><b>Description :</b><br>

<?php echo $row['description']; ?>

</p>

<p><b>Skills :</b>

<?php echo $row['skills']; ?>

</p>

<p><b>Deadline :</b>

<?php echo $row['deadline']; ?>

</p>

<p><b>Client :</b>

<?php echo $row['client_name']; ?>

</p>
<p>
<strong>Status:</strong>

<?php
if($row['status']=="Open")
{
    echo "<span style='color:green;font-weight:bold;'>Open</span>";
}
elseif($row['status']=="In Progress")
{
    echo "<span style='color:orange;font-weight:bold;'>In Progress</span>";
}
else
{
    echo "<span style='color:blue;font-weight:bold;'>Completed</span>";
}
?>

</p>

<a class="btn view"

href="project-details.php?id=<?php echo $row['id']; ?>">

View Details

</a>
<a class="btn edit"
href="edit_project.php?id=<?php echo $row['id']; ?>">
Edit
</a>

<a class="btn delete"
href="delete_project.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this project?');">
Delete
</a>

</div>

<?php

}

}

else

{

echo "<h2>No Projects Available</h2>";

}

?>

</div>

</section>

<footer>

<h3>FreelanceHub</h3>

<p>Hire the Best Freelancers for Your Business.</p>

<p>Email : support@freelancehub.com</p>

<p>Phone : +91 9876543210</p>

<p>© 2026 FreelanceHub. All Rights Reserved.</p>

</footer>

</body>
</html>