<?php session_start(); ?>
<?php
    include('connectdb.php');

    if(isset($_POST['submit'])){
      $tb_username = $_POST['tb_username'];
      $tb_password = $dbcon->real_escape_string($_POST['tb_password']);

      $sql = "SELECT * FROM `tb_member` WHERE `tb_username` = '".$tb_username."' AND `tb_password` = '".$tb_password."'";
      // $result = $dbcon->query($sql);
      $result = mysqli_query($dbcon, $sql);
      if($result->num_rows > 0)
      // if($result)
      {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['tb_id'] = $row['tb_id'];
        $_SESSION['tb_username'] = $row['tb_username'];
        $_SESSION['tb_password'] = $row['tb_password'];

        echo "<script>";
        echo "alert('ยินดีต้อนรับเข้าสู่ระบบ');";
        echo "window.location ='index.php'; ";
        echo "</script>";
      }else {
        echo "<script>";
        echo "alert('กรุณาใส่ Username และ Password ให้ถูกต้องเพื่อเข้าสู่ระบบ');";
        echo "window.location ='login_1.php'; ";
        echo "</script>";
      }
    }
?>
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
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
    <style media="screen">
    .form-group{
      font-family: 'Prompt', sans-serif;
    }
    </style>
  </head>
  <body>

    <div id="loginbox" style="margin-top:150px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

      <div class="panel panel-info">
        <div class="panel-heading"><font style="font-family: 'Prompt', sans-serif;">
          <div class="panel-title">Login สมาชิก</div>
        </div></font>
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          <form class="form-horizontal" action="login_1.php" method="POST">
            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="tb_username" class="form-control" value="" required>
                  </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="tb_password" class="form-control" value="" required>
                  </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" class="btn btn-success btn-xs" value="Login">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <a href="register.php" class="btn btn-info btn-xs">สมัครสมาชิก</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
