<?php include './config/database.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Jobcool</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-success mb-4">
      <a class="navbar-brand text-light" style="margin-left: 3%;" href="index.php">Jobcool</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <?php
          if (isset($_SESSION['user_id'])): ?>
            <a class="nav-link text-light" href="logout.php">Logout</a>
          <li class="nav-item">
            <a class="nav-link text-light" href="addjob.php">Add Job</a>
            <li class="nav-item">
            <a class="nav-link text-light" href="profile.php">My Profile</a>
          </li>
          </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link text-light" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="login.php">Log In</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="job.php">Jobs</a>
          </li>
          
        </ul>
      </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">
   