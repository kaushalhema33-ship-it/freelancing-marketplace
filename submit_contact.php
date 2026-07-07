<?php
include "db/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages
            (name, email, subject, message)
            VALUES
            ('$name', '$email', '$subject', '$message')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
        alert('Message Sent Successfully!');
        window.location='contact.php';
        </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
else
{
    header("Location: contact.php");
    exit();
}
?>