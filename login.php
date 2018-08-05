<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include('boostrap.php');?>
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
  </body>
</html>
