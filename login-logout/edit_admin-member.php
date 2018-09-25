<?php
    include('connectdb.php');

    $id = $_GET['id'];
    $q = "SELECT * FROM member WHERE id='$id'";
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
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
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
    </style>

  </head>
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
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form class="" action="update-member_db.php" method="post">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="example@domain.com" value="<?php echo $row['email']; ?>" required>
                <br>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <a href="admin_member.php" class="btn btn-danger">ยกเลิก</a>
                <input type="submit" name="submit" class="btn btn-success"value="บันทึกข้อมูล">

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
