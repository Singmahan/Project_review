<?php
    include('connectdb.php');

    $sql = "SELECT * FROM tb_member";
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
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
        .table th, td{
          text-align: center;
        }
        .container{
          font-family: 'Prompt', sans-serif;
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
          <?php include('navbar_check.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">แสดงข้อมูลสมาชิก</h3>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th>ลำดับที่</th>
              <th>ชื่อผู้ใช้</th>
              <th>รหัสผ่าน</th>
              <th>ชื่อ</th>
              <th>email</th>
              <th>ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td><?php echo $row['tb_id']; ?></td>
              <td><?php echo $row['tb_username']; ?></td>
              <td><?php echo $row['tb_password']; ?></td>
              <td><?php echo $row['tb_name']; ?></td>
              <td><?php echo $row['tb_email']; ?></td>
              <td><a href="delete_member.php?tb_id=<?php echo $row['tb_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('แน่ใจหรือว่าต้องการลบ ? ');">ลบ</a></td>
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
