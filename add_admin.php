<?php
    include('connectdb.php');

    $q = "SELECT * FROM admin";
    $result = mysqli_query($dbcon, $q);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include('boostrap.php');?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>เพิ่ม Admin</h1>
          <hr>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form class="" action="add_admin_db.php" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" class="form-control" value="" required>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" value="" required>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-success" value="เพิ่มข้อมูล">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <tr>
              <th>ลำดับ</th>
              <th>Username</th>
              <th>Password</th>
              <th>Name</th>
              <th>แก้ไข</th>
              <th>ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['password']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><a href="edit_admin.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">แก้ไข</a></td>
              <td><a href="delete_admin.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('แน่ใจหรือว่าต้องการลบข้อมูล ?');">ลบ</td>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
