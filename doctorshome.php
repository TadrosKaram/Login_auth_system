<?php 
require_once "datacon.php";
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'doctor') {
    // Not logged in or not a doctor
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Home</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", sans-serif;
      }

      body {
        height: 100vh;
        background: linear-gradient(135deg, rgb(0, 85, 255), rgb(3, 3, 144));
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px;
        position: relative;
      }

      #logoutbtn {
        position: absolute;
        top: 20px;
        right: 30px;
        background: red;
        color: white;
        padding: 12px 25px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
      }

      #logoutbtn:hover {
        background: darkred;
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
      }

      h1 {
        margin-top: 80px;
        margin-bottom: 40px;
        font-size: 48px;
      }

      .button-container {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        justify-content: center;
      }

      .btn {
        color: rgb(0, 0, 0);
        border: none;
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        transition: 0.3s ease;
      }

      .btn:hover {
        background-color: orange;
        color: white;
      }
    </style>
  </head>
  <body>
    <a href="index.php" id="logoutbtn">Logout</a>

    <h1>Welcome Doctor</h1>

<?php 

if ($_SESSION["type"] == '1') { 
?>
    <div class="button-container">
      <a href="adddoctors.php" class="btn" style="background-color: orange">
        View/Add doctors
      </a>
    </div>
<?php 
} 
?>

      <a href="removestudent.php" class="btn" style="background-color: tomato"
        >Remove student</a
      >
    </div>
  </body>
</html>
