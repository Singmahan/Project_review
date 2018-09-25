<?php
    include('connectdb.php');

    $id = $_GET['id'];
    $q = "SELECT * FROM admin WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    img{
        padding: 10px;
    }
    </style>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
