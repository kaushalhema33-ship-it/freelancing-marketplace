<?php

include "db/connection.php";

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    mysqli_query($conn,"DELETE FROM projects WHERE id='$id'");

    echo "<script>
    alert('Project Deleted Successfully');
    window.location='projects.php';
    </script>";
}
else
{
    echo "Invalid Request";
}

?>