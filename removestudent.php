<?php

require_once "datacon.php";


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'doctor') {
    // Not logged in or not a doctor
    header("Location: login.php");
    exit;
}

if (isset($_POST['delete_id'])){
    $id = intval($_POST['delete_id']);
    $deleteQuery = "DELETE FROM students WHERE id=$id";
    if (mysqli_query($conn,$deleteQuery)){
        header("Location: removestudent.php?deleted=1");
        exit;
    } else {
        echo "Delete failed!";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Removal</title>
</head>
<body>
      <div style="margin-left: 30px">
        <?php
$selectQuery = "SELECT * FROM students";
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
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <form
          id="promptForm"
          method="POST"
          style="width: 100%; margin-top: 15px"
        >
          <input type="hidden" name="delete_id" id="delinput" />
          <button
            type="submit"
            style="
              width: 100%;
              background-color: rgb(226, 43, 86);
              color: white;
              border: none;
              padding: 10px;
              cursor: pointer;
            "
            class="del-btn"
          >
            Delete ❌
          </button>
        </form>

        <?php else: ?>
        <p>No users entered yet</p>
        <?php endif; ?>
      </div>
      <script src="deleteprompt.js"></script>
</body>
</html>

