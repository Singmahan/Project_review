<?php
    session_start();
    include('connectdb.php');
    include('session.php');

    $sql = "SELECT * FROM login_member";
    $result = mysqli_query($dbcon, $sql);

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
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style media="screen">
      .container{
        font-family: 'Prompt', sans-serif;
      }
      th{
        background-color: #12B3EB;
      }
      td{
        background-color: #DBF9BA;
      }
      #status{
        background-color: #C0810C;
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
          <?php include('navbar_admin.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">ข้อมูลสมาชิก</h3>
          <hr>
          <p>
            สถานะ :
            0 = สมาชิกทั่วไป ,
            1 = ผู้ดูแลระบบ ,
            2 = บรรณารักษ์ ,
            3 = สมาชิกที่ถูกระงับใช้งานชั่วคราว
          </p>
          <?php

                    include('connectdb.php');

                    $pro_search = $_POST['pro_search'];
                    $p = '%'.$pro_search.'%';
                    $sql = "SELECT * FROM login_member WHERE username LIKE '$p'";
                    $result = mysqli_query($dbcon, $sql);

          ?>
          <div class="container">
            <div class="col-md-12">
              <form class="" action="show_member.php" method="post">
                <div class="form-group">
                  <label>ค้นหา :</label>
                  <input type="text" name="pro_search" value="" autofocus autocomplete="off">
                  <input type="submit" name="submit" value="ค้นหา">
                </div>
              </form>
            </div>
          </div>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับ</th>
              <th class="text-center">ชื่อผู้ใช้</th>
              <th class="text-center">รหัสผ่าน</th>
              <th class="text-center">ชื่อ</th>
              <th class="text-center">อีเมล</th>
              <th class="text-center">สถานะ</th>
              <th class="text-center">จัดการสถานะ</th>
              <th class="text-center">ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td class="text-center" id="status"><?php echo $row['status']; ?></td>
              <td class="text-center"><a href="edit_member.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">จัดการสถานะ</a></td>
              <td class="text-center"><a href="delete_member.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');">ลบ</a></td>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
