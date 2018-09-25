<?php
    include('connectdb.php');

    $q = "SELECT * FROM member";
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เพิ่มสมาชิก</button>
          <br>
          <h3>สำหรับเพิ่ม Admin และ บรรณารักษ์ เท่านั้น</h3>
          <table class="table table-bordered" id="example">
            <thead>
            <tr>
              <th>ลำดับที่</th>
              <th>ชื่อผู้ใช้</th>
              <th>รหัสผ่าน</th>
              <th>ชื่อ</th>
              <th>email</th>
              <th>แก้ไข</th>
              <th>ลบ</th>

            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><a href="edit_admin-member.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">แก้ไข</a></td>
              <!-- <td><button type="button" class="btn btn-primary" href="edit_admin-member.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เพิ่มสมาชิก</button></td> -->
              <td><a href="delete_admin-member.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบ จริงหรือ ?');">ลบ</a></td>


            </tr>
          <?php }?>
          </tbody>
          </table>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิก</h4>
                </div>
                <div class="modal-body">
                  <form class="" action="add_admin-member_db.php" method="post">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="" required>
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" required>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" required>
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="example@domain.com" value="" required>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                          <input type="submit" name="submit" class="btn btn-success"value="เพิ่มสมาชิก">
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
