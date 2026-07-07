<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Submit Proposal</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav class="navbar">

<div class="logo">
FreelanceHub
</div>

<ul class="nav-links">

<li><a href="index.php">Home</a></li>

<li><a href="projects.php">Projects</a></li>

<li><a href="freelancers.php">Freelancers</a></li>

<li><a href="dashboard.php">Dashboard</a></li>

</ul>

</nav>

<section class="projects">

<h2>Submit Proposal</h2>

<form action="submit_proposal.php" method="POST">

<input
type="text"
name="freelancer_name"
placeholder="Freelancer Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="tel"
name="phone"
placeholder="Phone Number"
required>

<input
type="number"
name="budget"
placeholder="Expected Budget"
required>

<textarea
name="proposal"
rows="6"
placeholder="Write your proposal..."
required></textarea>

<button
type="submit"
class="btn">

Submit Proposal

</button>

</form>

</section>

</body>
</html>