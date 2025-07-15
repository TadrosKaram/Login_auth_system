<?php

require_once "datacon.php";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $pass = $_POST['password'];

  $studentQuery = "SELECT * FROM students WHERE username = '$username' AND pass = '$pass'";
  $studentResult = mysqli_query($conn, $studentQuery);

  if (mysqli_num_rows($studentResult) == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'student';
    header("Location: studenthome.php");
    exit;
  }

  $doctorQuery = "SELECT * FROM doctor WHERE username = '$username' AND pass = '$pass'";
  $doctorResult = mysqli_query($conn, $doctorQuery);

  if (mysqli_num_rows($doctorResult) == 1) {
$query = "SELECT * FROM doctor WHERE username = '$username' AND type = 2 LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $_SESSION['type'] = '2';
}
$_SESSION["type"] = '1';
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'doctor';
    header("Location: doctorshome.php");
    exit;
  }

 echo '<span style="color: red; margin-right:50px;" >Invalid username or password, Please try again</span>';

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login SIS</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", sans-serif;
      }

      body {
        height: 100vh;
        background: linear-gradient(135deg, rgb(0, 85, 255), rgb(3, 3, 144));
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
      }

      .wrapper {
        display: flex;
        max-width: 800px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        box-shadow: 50px 70px 70px rgba(0, 0, 0, 0.2);
        overflow: hidden;
      }

      .login-container {
        padding: 40px 30px;
        width: 50%;
      }

      .login-container h1 {
        text-align: center;
        color: orange;
        font-size: 70px;
        margin-bottom: 30px;
      }

      .login-container input {
        width: 100%;
        padding: 12px 14px;
        margin: 30px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
      }

      .login-container button {
        width: 100%;
        padding: 12px;
        background-color: orange;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
      }

      .login-container button:hover {
        background-color: rgb(3, 3, 144);
      }

      .image-container {
        width: 50%;
        background: url("https://st2.depositphotos.com/3662505/6878/i/950/depositphotos_68789187-stock-photo-students.jpg")
          center center / cover no-repeat;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <form class="login-container" action="login.php" method="POST">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username" required />
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
        />
        <button type="submit" name="login">Log In</button>
        <p style="margin-top: 15px">
          Don't have an account?..
          <a style="text-decoration: none; color: orange" href="register.php"
            >Sign Up</a
          >
        </p>
      </form>

      <div class="image-container">
        <!-- Background image will auto-fill this space -->
      </div>
    </div>
  </body>
</html>
