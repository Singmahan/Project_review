<?php
    include('connectdb.php');

    $q = "SELECT * FROM tbl_book_type";
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

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <style type="text/css">
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
          <h3 class="text-center">เพิ่มประเภทหนังสือ</h3>
          <hr>
          <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
              <div style="padding-top:30px" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form class="form-horizontal" action="addtype_book_db.php" method="post">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">หนังสือประเภท :</label>
                    <div class="col-sm-8">
                      <input type="text" name="type_name" class="form-control" value="" required autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">วันที่เพิ่ม :</label>
                    <div class="col-sm-8">
                      <input type="date" name="datetime" class="form-control" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                      <input type="reset" name="reset" class="btn btn-danger" value="ยกเลิก">
                      <input type="submit" name="type_id" class="btn btn-success" value="บันทึกข้อมูล">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">แสดงข้อมูลประเภทหนังสือ</h3>
          <hr>
          <?php
                    include('connectdb.php');

                    $pro_search = $_POST['pro_search'];
                    $p = '%'.$pro_search.'%';
                    $sql = "SELECT * FROM tbl_book_type WHERE type_name LIKE '$p'";
                    $result = mysqli_query($dbcon, $sql);


          ?>
          <div class="container">
            <div class="col-md-12">
              <form class="form-horizontal" action="addtype_book.php" method="post">
                <div class="form-group">
                  <label>ค้นหา :</label>
                  <input type="text" name="pro_search" value="" autocomplete="off">
                  <input type="submit" name="submit" value="ค้นหา">
                </div>
              </form>
            </div>
          </div>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับที่</th>
              <th class="text-center">ประเภทของหนังสือ</th>
              <th class="text-center">วันที่เพิ่ม</th>
              <th class="text-center">แก้ไข</th>
              <th class="text-center">ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td class="text-center"><?php echo $row['type_id']; ?></td>
              <td><?php echo $row['type_name']; ?></td>
              <td class="text-center"><?php echo $row['datetime']; ?></td>
              <td class="text-center">
              <a href="edit_type_book.php?type_id=<?php echo $row['type_id']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a>
              </td>
              <td class="text-center">
              <a href="delete_type_book.php?type_id=<?php echo $row['type_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');"><span class="glyphicon glyphicon-trash"></span> ลบ</a>
              </td>

            </tr>
          <?php } ?>
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
