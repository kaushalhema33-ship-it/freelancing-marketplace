<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us | FreelanceHub</title>

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
color:white;
font-size:28px;
font-weight:bold;
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
width:500px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);
}

.container h2{
text-align:center;
margin-bottom:20px;
}

input,textarea{
width:100%;
padding:12px;
margin:10px 0;
box-sizing:border-box;
}

button{
width:100%;
padding:12px;
background:#007bff;
color:white;
border:none;
cursor:pointer;
font-size:16px;
}

button:hover{
background:#0056b3;
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
<li><a href="contact.php">Contact</a></li>

</ul>

</nav>

</header>

<div class="container">

<h2>Contact Us</h2>

<form action="submit_contact.php" method="POST">

<input
type="text"
name="name"
placeholder="Your Name"
required>

<input
type="email"
name="email"
placeholder="Your Email"
required>

<input
type="text"
name="subject"
placeholder="Subject"
required>

<textarea
name="message"
rows="6"
placeholder="Write your message..."
required></textarea>

<button type="submit">
Send Message
</button>

</form>

</div>

</body>
</html>