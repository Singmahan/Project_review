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

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">สมัครสมาชิก</h3>
          <hr>
          <div class="col-sm-6">
            <form class="" action="register_db.php" method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="tb_username" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="tb_password" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="tb_name" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="tb_email" class="form-control" value="" required>
              </div>
              <div class="form-group">

                <input type="submit" name="submit" class="btn btn-success" value="สมัครสมาชิก">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
