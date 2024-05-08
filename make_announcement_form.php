<?php

require 'user_db_conn.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $title = $_POST["announcementTitle"];
    $description = $_POST["announcementDescription"];

    
    $query = "INSERT INTO announcements (name, email, announcement_title, announcement_description) VALUES ('$name', '$email', '$title', '$description')";
    mysqli_query($conn, $query);

   
    echo "<script>alert('Announcement is successful!'); window.location='make_announcement_form.php';</script>";
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="make_announcement.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Announcement Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      color: white;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    textarea {
      height: 100px;
    }
    button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
        <div class="container-fluid">
            <img class="logo" src="final_logo.png" alt="Logo" srcset="">
            <a class="navbar-brand" href="#" style="color: white">OAEC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #f1b24a"">
            <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard_non_student_admin.php" style="color: white">Home</a>
                    </li>
                    <li class="nav-item ml-auto" style=" border-radius:10px">
                        <a class="nav-link" href="logout.php" style="color: white; text-decoration:none;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <div class="container">
    <h2>Announcement Form</h2>
    <form id="announcementForm" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="announcementTitle">Announcement Title:</label>
        <input type="text" id="announcementTitle" name="announcementTitle" required>
      </div>
      <div class="form-group">
        <label for="announcementDescription">Announcement Description:</label>
        <textarea id="announcementDescription" name="announcementDescription" required></textarea>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
