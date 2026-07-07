<?php
include "db/connection.php";

if (!isset($_GET['id'])) {
    die("Project ID Missing");
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM projects WHERE id='$id'");

if (mysqli_num_rows($result) == 0) {
    die("Project Not Found");
}

$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $client = mysqli_real_escape_string($conn, $_POST['client_name']);

    $sql = "UPDATE projects SET
            title='$title',
            category='$category',
            budget='$budget',
            description='$description',
            skills='$skills',
            deadline='$deadline',
            status='$status',
            client_name='$client'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Project Updated Successfully');
                window.location='projects.php';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Project</title>

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
    background:green;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:darkgreen;
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

<h2>Edit Project</h2>

<form method="POST">

<input
type="text"
name="title"
value="<?php echo $row['title']; ?>"
required>

<input
type="text"
name="category"
value="<?php echo $row['category']; ?>"
required>

<input
type="number"
name="budget"
value="<?php echo $row['budget']; ?>"
required>

<textarea
name="description"
rows="5"
required><?php echo $row['description']; ?></textarea>

<input
type="text"
name="skills"
value="<?php echo $row['skills']; ?>"
required>

<input
type="date"
name="deadline"
value="<?php echo $row['deadline']; ?>"
required>

<label><strong>Status</strong></label>

<select name="status" required>

<option value="Open" <?php if($row['status']=="Open") echo "selected"; ?>>
Open
</option>

<option value="In Progress" <?php if($row['status']=="In Progress") echo "selected"; ?>>
In Progress
</option>

<option value="Completed" <?php if($row['status']=="Completed") echo "selected"; ?>>
Completed
</option>

</select>

<input
type="text"
name="client_name"
value="<?php echo $row['client_name']; ?>"
required>

<button
type="submit"
name="update">

Update Project

</button>

</form>

<a href="projects.php" class="back">
← Back to Projects
</a>

</div>

</body>
</html>