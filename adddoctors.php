<?php 
require_once "datacon.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'doctor') {
    // Not logged in or not a doctor
    header("Location: login.php");
    exit;
}
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $age = $_POST['age'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];

$enteredQuery = "INSERT INTO doctor 
(username, pass, age, gender, email, phone, type)
VALUES ('$username','$pass',$age,'$gender','$email','$phone',$type);";


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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add doctors</title>
</head>
<body>
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

   <select name="type"><option value="1">Admin</option>
   <option value="2">Sub-Admin</option></select>

          <input
            type="submit"
            name="save"
            style="background-color: orange; margin-top: 20px"
            id="btn-save"
          />
       
        </fieldset>
      </form>
      <div style="margin-left: 30px">
        <?php
$selectQuery = "SELECT * FROM doctor";
$selectResult = mysqli_query($conn,$selectQuery);
 if (mysqli_num_rows($selectResult) >
        0): ?>
        <table
          border="1"
          cellpadding="8"
          cellspacing="0"
          style="margin-top: 30px"
        >
          <thead>
            <tr>
              <th>ID</th>
             <th>Username</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Type</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($selectResult)): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['username']) ?></td>
            
              <td><?= $row['age'] ?></td>
              <td><?= $row['gender'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['type'] ?></td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

        <?php else: ?>
        <p>No users entered yet</p>
        <?php endif; ?>
      </div>
      <script>
  function togglePassword() {
    const input = document.getElementById("password");
    input.type = input.type === "password" ? "text" : "password";
  }
</script>
</body>
</html>

