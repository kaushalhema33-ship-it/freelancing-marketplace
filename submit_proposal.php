<?php
include "db/connection.php";

if (!$conn) {
    die("DB Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $freelancer_name = mysqli_real_escape_string($conn, $_POST['freelancer_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
    $proposal = mysqli_real_escape_string($conn, $_POST['proposal']);

    $sql = "INSERT INTO proposals
            (freelancer_name, email, phone, budget, proposal)
            VALUES
            ('$freelancer_name','$email','$phone','$budget','$proposal')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Proposal Submitted Successfully');
        window.location='proposal.php';
        </script>";
    }
    else
    {
        echo "SQL Error: ".mysqli_error($conn);
    }

} else {
    echo "Invalid Request";
}
?>