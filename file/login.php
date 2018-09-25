<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    img{
        padding: 10px;
    }
    </style>
  </head>
  <body>
    <?php
        include('connectdb.php');

        if(isset($_POST['submit'])){
          $username = $_POST['username'];
          $password = $dbcon->real_escape_string($_POST['password']);

          $sql = "SELECT * FROM `member` WHERE `username` = '".$username."' AND `password` = '".$password."'";
          // $result = $dbcon->query($sql);
          $result = mysqli_query($dbcon, $sql);
          if($result->num_rows > 0)
          // if($result)
          {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];

            echo "<script>";
      			echo "alert('ยินดีต้อนรับเข้าสู่ระบบ');";
      			echo "window.location ='index.php'; ";
      			echo "</script>";
          }else {
            echo "<script>";
      			echo "alert('กรุณาใส่ Username และ Password ให้ถูกต้องเพื่อเข้าสู่ระบบ');";
      			echo "window.location ='login.php'; ";
      			echo "</script>";
          }
        }
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <form class="" action="login.php" method="post">
            <div class="form-group">
              <h3>Login</h3>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" value="" required>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-success" value="Login">
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
