<?php 

require_once "datacon.php";
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", sans-serif;
      }

      body {
        height: 100vh;
        display: flex;
        background: linear-gradient(135deg, rgb(0, 85, 255), rgb(3, 3, 144));
        overflow: hidden;
      }

      .main {
        flex: 1;
        padding: 40px;
        color: white;
      }

      .main h1 {
        font-size: 36px;
        margin-bottom: 20px;
      }

      .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
      }

      .card {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 12px;
        color: rgb(3, 3, 144);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }

      .card h3 {
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <div class="d-flex">
      <a href="logout.php" class="btn btn-outline-danger me-2" id="logoutbtn">
        Logout
      </a>
    </div>

    <div class="main">
      <h1>Welcome, Student!</h1>
      <p style="color: orange">
        Here’s a quick overview of your academic progress:
      </p>

      <br /><br /><br />

      <div class="card-grid">
        <div class="card" style="background-color: rgb(10, 202, 10)">
          <h3>Current GPA</h3>
          <p>3.85</p>
        </div>
        <div class="card" style="background-color: rgb(40, 119, 237)">
          <h3>Enrolled Courses</h3>
          <p>5 Courses</p>
        </div>
        <div class="card" style="background-color: rgb(202, 61, 10)">
          <h3>Upcoming Exams</h3>
          <p>2 This Week</p>
        </div>
        <div class="card" style="background-color: orange">
          <h3>New Announcements</h3>
          <p>3 Notifications</p>
        </div>
      </div>
    </div>
  </body>
</html>
