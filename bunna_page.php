<?php
    session_start();
    include('connectdb.php');
    include('session.php');

    $sql = "SELECT * FROM login_member";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

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

    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
        .container{
          font-family: 'Prompt', sans-serif;
          font-size: 18px;
        }

    </style>

  </head>
  <body>
    <div class="container">
      <div class="row">
          <?php include('banner.php');?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include('navbar_bunna.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-12">
        <h3 class="text-center">ยินดีต้อนรับบรรณารักษ์</h3>
        <br>
      </div>
    </div>
    <div class="container">
        <div class="col-xs-6 col-sm-3 placeholder" align="center">
          <a href="show_book_2.php"><img src="img/test.png" alt="" width="50%" style="padding-bottom:20px" class="img-thumbnail"/></a>
          <p>
            <a href="show_book_2.php">จัดการข้อมูลหนังสือ</a>
          </p>

        </div>
        <div class="col-xs-6 col-sm-3 placeholder" align="center">
          <a href="show_rating_top.php"><img src="img/test.png" alt="" width="50%" style="padding-bottom:20px" class="img-thumbnail"/></a>
          <p>
            <a href="show_rating_top.php">รายงาน Rating สูงสุด</a>
          </p>

        </div>
        <div class="col-xs-6 col-sm-3 placeholder" align="center">
          <a href="#"><img src="img/test.png" alt="" width="50%" style="padding-bottom:20px" class="img-thumbnail"/></a>
          <p>
            <!-- <a href="show_report.php">Rating สูงสุด</a> -->
            <a href="#">#</a>
          </p>

        </div>
        <div class="col-xs-6 col-sm-3 placeholder" align="center">
          <a href="rating_top.php"><img src="img/test.png" alt="" width="50%" style="padding-bottom:20px" class="img-thumbnail"/></a>
          <p>
            <a href="rating_top.php">10 Rating สูงสุด</a>
          </p>

        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
