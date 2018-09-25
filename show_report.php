<?php session_start(); ?>
<?php
      include('connectdb.php');
      include('session.php');

      $sql = "SELECT * FROM report";
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
    <style media="screen">
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
          <?php include('navbar_bunna.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">รายงานหนังสือ Rating สูงสุด</h3>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับที่</th>
              <th class="text-center">ชื่อหนังสือ</th>
              <th class="text-center">ประเภทหนังสือ</th>
              <th class="text-center">เข้าดู</th>
              <th class="text-center">Rating</th>
              <th class="text-center">เฉลี่ย</th>
              <th class="text-center">วันที่</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
            <tr>
              <td class="text-center"><?php echo $row['r_id'] ?></td>
              <td><?php echo $row['r_book'] ?></td>
              <td><?php echo $row['r_type'] ?></td>
              <td class="text-center"><?php echo $row['r_view'] ?></td>
              <td class="text-center"><?php echo $row['r_rating'] ?></td>
              <td class="text-center"><?php echo $row['r_av'] ?></td>
              <td class="text-center"><?php echo $row['r_datesave'] ?></td>
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
