<?php session_start();?>
<?php
    include('connectdb.php');
    include('session.php');

    $sql = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id";
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
      input[type=number]{
        width:40px;
        text-align:center;
        color:red;
        font-weight:600;
      }
      .container{
        font-family: 'Prompt', sans-serif;
      }
      th{
        background-color: #12B3EB;
      }
      td{
        background-color: #DBF9BA;
      }
      #view{
        background-color: #CEDA8F;
      }
      #rating{
        background-color: #34D7DA;
      }
      #rating_count{
        background-color: #DAC334;
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
          <h3 class="text-center">รายงานหนังสือที่มีอันดับ Rating สูงสุด</h3>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับที่</th>
              <th class="text-center">ประเภท</th>
              <th class="text-center">ชื่อหนังสือ</th>
              <th class="text-center">จำนวนการดู</th>
              <th class="text-center">Rating</th>
              <th class="text-center">เฉลี่ย</th>
              <th class="text-center">ดูข้อมูล</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td class="text-center"><?php echo $row['id']; ?></td>
              <td><?php echo $row['type_name']; ?></td>
              <td class="text-center"><?php echo $row['b_name']; ?></td>
              <td class="text-center" id="view"><?php echo $row['p_view']; ?></td>
              <td class="text-center" id="rating"><?php echo $row['rating']; ?></td>
              <td class="text-center" id="rating_count"><?php echo $row['rating_count']; ?></td>
              <td class="text-center"><a href="report_rating.php?id=<?php echo $row['id']; ?>">ดูข้อมูล</a></td>
            </tr>
          <?php }?>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
