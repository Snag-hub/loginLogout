<!-- Create two button (Login & Logout) with the help of CSS and PHP to show the Login time and Logout time with time difference between both session, moreover need to display total time of login session if there are multiple login logout on same day. -->


<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
?>


<html>

<head>
  <title>Assignment</title>
  <style>
    body {
      background-color: #f2f2f2;
    }

    form {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .btn {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;

    }

    .row {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    th,
    tr {
      text-align: left;
      padding: 20px;
    }
  </style>
</head>

<body>
  <h1>Assignment</h1>
  <form method="get">
    <div class="row">
      <input type="submit" name="login" value="Login" class="btn">
      <input type="submit" name="logout" value="Logout" class="btn">
    </div>
  </form>
  <center>
    <table border="1">
      <?php
      if (isset($_GET['login'])) {
        $_SESSION['login'] = date("h:i:s");
      }
      if (isset($_GET['logout'])) {
        $_SESSION['logout'] = date("h:i:s");
      }
      $login = $_SESSION['login'];
      $logout = $_SESSION['logout'];
      $diff = strtotime($logout) - strtotime($login);
      $diff = gmdate("H:i:s", $diff);
      $total = strtotime($logout) - strtotime($login);
      $total = gmdate("H:i:s", $total);

      echo "<tr>";
      echo "<th>". "Login Time". "</th>";
      echo "<td>" . $login . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<th>". "Logout Time". "</th>";
      echo "<td>" . $logout . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<th>". "Difference Time". "</th>";
      echo "<td>" . $diff . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<th>". "Total Time". "</th>";
      echo "<td>" . $total . "</td>";
      echo "</tr>";

      ?>
       
    </table>
  </center>
</body>

</html>