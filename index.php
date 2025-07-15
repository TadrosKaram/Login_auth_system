<?php

require_once "datacon.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Student SIS</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", sans-serif;
      }
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh !important;
        overflow: hidden;
        background: linear-gradient(135deg, rgb(0, 85, 255), rgb(3, 3, 144));
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <!-- Brand/Logo (Left) -->
        <a class="navbar-brand" href="#"
          >Faculty Of Engineering Ain Shams University</a
        >

        <!-- Toggler (Mobile) -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

      
          <!-- Login/Logout Buttons (Right) -->
          <div class="d-flex">
            <a
              href="login.php"
              class="btn btn-outline-primary me-2"
              id="loginBtn"
            >
              Login
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div
      style="
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        height: 100%;
        color: white;
        margin-top: 30px;
      "
    >
      <div>
        <h1 style="font-size: 80px">Welcome to our faculty</h1>
        <p style="font-size: 20px">Register as a student now!</p>
        <a href="register.php" class="btn btn-outline-warning">GET STARTED </a>
        <br /><br />
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
