<?php
require_once "datacon.php";



if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $age = $_POST['age'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $enteredQuery = "INSERT INTO students VALUES (NULL,'$username','$pass',$age,'$gender','$email','$phone');";

    if (mysqli_query($conn, $enteredQuery)) {
        header("Location: login.php");
        exit;
    } else {
        echo 'Unexpected error: ' . mysqli_error($conn);
    }
}


 




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FullStack form - TK</title>
  </head>

  <style>
    * {
      font-family: "Segoe UI", sans-serif;
    }
    #btn-save {
      color: white;
    }
    #btn-save:hover {
      transition: 0.5s ease-in-out;
      background-color: rgb(27, 14, 164) !important;
    }
  </style>

  <body
    style="
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, rgb(0, 85, 255), rgb(3, 3, 144));
      overflow: hidden;
    "
  >
    <!-- Enter your data form -->
    <div
      style="
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      "
    >
      <form method="POST">
        <fieldset
          style="
            height: 60vh;
            width: 400px;
            display: flex;
            justify-content: space-evenly;
            flex-direction: column;
            background-color: white;
            font-size: 18px;
            border: 4px solid black;
          "
        >
          <legend style="background-color: orange">Fill the form</legend>
          <label for="username">User Name</label>
          <input
            type="text"
            id="username"
            name="username"
            required
            placeholder="Adam"
          />
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
          <label style="font-size: 15px">
            <input type="checkbox" onclick="togglePassword()" /> Show Password
          </label>

          <label for="age">Age</label>
          <input type="number" id="age" name="age" required placeholder="43" />
          <label
            ><input
              type="radio"
              checked
              name="gender"
              value="male"
            />Male</label
          ><label
            ><input type="radio" name="gender" value="female" />Female</label
          >
          <label for="email"
            >Email <i style="font-size: 8px">(Optional)</i></label
          >
          <input
            type="email"
            name="email"
            id="email"
            placeholder="adammessi17@gmail.com"
          />
          <label for="phone">Phone</label>
          <input
            type="text"
            pattern="\d*"
            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
            title="Please enter numbers only (0-9)"
            id="phone"
            name="phone"
            required
            placeholder="01xxxxxxxx"
          />

          <input
            type="submit"
            name="save"
            style="background-color: orange; margin-top: 20px"
            id="btn-save"
          />
          <p>
            Already a student?..
            <a href="login.php" style="color: orange; text-decoration: none"
              >Login</a
            >
          </p>
        </fieldset>
      </form>
      <!-- logo -->
      <img
        src="data:image/png;base64,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"
        style="margin-left: 30px; border: 4px solid black"
      />
    </div>
    <script>
      function togglePassword() {
        const pass = document.getElementById("password");
        pass.type = pass.type === "password" ? "text" : "password";
      }
    </script>
  </body>
</html>
