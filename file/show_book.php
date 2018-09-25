<?php
    include('connectdb.php');

    $q = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id";
    $result = mysqli_query($dbcon, $q);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <?php include('font.php');?>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
        th{

          text-align: center;
          font-size: 12px;

        }
        td{
          font-size: 12px;

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
          <?php include('navbar.php');?>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <hr>
          <div class="container"><font style="font-family: 'Prompt', sans-serif;">
            <div class="row" align="right">
              <div class="col-md-12">
                <a href="add_book.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มหนังสือ</a>
                <br><br>
              </div>
            </div>
          </div></font>

        </div>
      </div>
    </div>

    <div class="container-fluid"><font style="font-family: 'Prompt', sans-serif;">
      <div class="rows">
        <div class="col-xs-12">
          <table class="table table-bordered">
            <tr>
              <th>ที่</th>
              <th>ชื่อหนังสือ</th>
              <th>ประเภท</th>
              <th>รหัส</th>
              <th>ผู้แต่ง</th>
              <th>ครั้งที่พิมพ์</th>
              <th>พิมพลักษณ์</th>
              <th>ลักษณะกายภาพ</th>
              <th>หัวเรื่อง</th>
              <th>ISBN</th>
              <th>รายละเอียด</th>
              <th>เนื้อหาสังเขป</th>
              <th>ภาพ 1</th>
              <th>ภาพ 2</th>
              <th>ภาพ 3</th>
              <th>วันที่เพิ่ม</th>
              <!-- <th>แก้ไข</th>
              <th>ลบ</th> -->
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['b_name']; ?></td>
              <td><?php echo $row['type_name']; ?></td>
              <td><?php echo $row['b_dcall']; ?></td>
              <td><?php echo $row['b_author']; ?></td>
              <td><?php echo $row['b_print']; ?></td>
              <td><?php echo $row['b_imprint']; ?></td>
              <td><?php echo $row['b_physical']; ?></td>
              <td><?php echo $row['b_heading']; ?></td>
              <td><?php echo $row['b_isbn']; ?></td>
              <td><?php echo $row['b_detail']; ?></td>
              <td><?php echo $row['b_briefly']; ?></td>
              <td><img src="image/01/<?php echo $row['b_img1']; ?>" width="50px" /></td>
              <td><img src="image/02/<?php echo $row['b_img2']; ?>" width="50px" /></td>
              <td><img src="image/03/<?php echo $row['b_img3']; ?>" width="50px" /></td>
              <td><?php echo $row['date']; ?></td>
              <td>
              <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
              </td>
              <td>
              <a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');"><span class="glyphicon glyphicon-trash"></a>
              </td>

            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div></font>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
