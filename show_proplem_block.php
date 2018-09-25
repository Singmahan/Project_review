<?php
    include('connectdb.php');

    $sql = "SELECT * FROM problem_block";
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
    #detail{
      background-color: #CEDA8F;
    }

    </style>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
          <h3 class="text-center">แสดงรายการปัญหาเนื่องจากสมาชิกเข้าใช้งานระบบไม่ได้</h3>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับ</th>
              <th class="text-center">ชื่อผู้ส่ง</th>
              <th class="text-center">E-mail</th>
              <th class="text-center">รายละเอียด</th>
              <th class="text-center">วันที่รายงาน</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
            <tr>
              <td class="text-center"><?php echo $row['pb_id'] ?></td>
              <td class="text-center"><?php echo $row['pb_name'] ?></td>
              <td class="text-center"><?php echo $row['pb_email'] ?></td>
              <td><?php echo $row['pb_detail'] ?></td>
              <td class="text-center"><?php echo $row['pb_date'] ?></td>
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
