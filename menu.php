<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Book Review</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="active"><a href="#">Home</a></li>
      <li class="active"><a href="#">Home</a></li>
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <!-- <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul> -->

    <ul class="nav navbar-nav navbar-right">
      <!-- ถ้ายังไม่ login ต้องแสดงปุ่ม login ให้เห็น -->
      <?php if(isset($_SESSION['id'])) { ?>
        <li class="nav-item">
          <a class="nav-link disabled" href="logout.php">Logout</a>
        </li>
    <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="login.php">Login</a>
          </li>

    <?php } ?>
      </ul>
  </div>
</nav>
</body>
</html>
