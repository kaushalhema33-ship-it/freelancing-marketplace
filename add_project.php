<?php
include "db/connection.php";

$message = "";

if(isset($_POST['add_project']))
{
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $client = mysqli_real_escape_string($conn, $_POST['client_name']);

    $sql = "INSERT INTO projects
    (title, category, budget, description, skills, deadline, status, client_name)
    VALUES
    ('$title', '$category', '$budget', '$description', '$skills', '$deadline', '$status', '$client')";

    if(mysqli_query($conn, $sql))
    {
        $message = "Project Added Successfully!";
    }
    else
    {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Project | FreelanceHub</title>

<link rel="stylesheet" href="style.css">

<style>

body{
    font-family:Arial,sans-serif;
    background:#f5f5f5;
    margin:0;
    padding:0;
}

.container{
    width:500px;
    margin:40px auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#007bff;
}

.success{
    color:green;
    text-align:center;
    font-weight:bold;
}

input,
textarea,
select{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#0056b3;
}

.back{
    display:block;
    text-align:center;
    margin-top:20px;
    text-decoration:none;
    color:#007bff;
}

</style>

</head>

<body>

<div class="container">

<h2>Add New Project</h2>

<?php
if($message!="")
{
    echo "<p class='success'>$message</p>";
}
?>

<form method="POST">

<input
type="text"
name="title"
placeholder="Project Title"
required>

<input
type="text"
name="category"
placeholder="Category"
required>

<input
type="number"
name="budget"
placeholder="Budget"
required>

<textarea
name="description"
placeholder="Project Description"
rows="5"
required></textarea>

<input
type="text"
name="skills"
placeholder="Required Skills"
required>

<input
type="date"
name="deadline"
required>

<select name="status" required>

<option value="">Select Status</option>

<option value="Open">Open</option>

<option value="In Progress">In Progress</option>

<option value="Completed">Completed</option>

</select>

<input
type="text"
name="client_name"
placeholder="Client Name"
required>

<button
type="submit"
name="add_project">

Add Project

</button>

</form>

<a href="projects.php" class="back">
← Back to Projects
</a>

</div>

</body>
</html>