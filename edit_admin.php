<?php
    include('connectdb.php');

    $id = $_GET['id'];
    $q = "SELECT * FROM admin WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
          <h1>แก้ไข Admin</h1>
          <hr>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form class="" action="update_admin_db.php" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>" required>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <input type="submit" name="submit" class="btn btn-success" value="แก้ไขข้อมูล">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
