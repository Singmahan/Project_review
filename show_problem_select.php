<?php session_start();?>
<?php
    include('connectdb.php');
    include('session.php');

    $p_id = $_GET['p_id'];
    $sql = "SELECT * FROM problem WHERE p_id='$p_id'";
    $result = mysqli_query($dbcon, $sql);
    $row_problem = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
    #loginbox{
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
          <?php include('navbar_admin.php');?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">รายละเอียดปัญหา</h3>
          <hr>
        </div>
      </div>
    </div>
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info">
        <div style="padding-top:30px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          <form class="form-horizontal" action="show_problem_select.php" method="post">
            <div class="form-group">
              <label class="col-sm-3 control-label">รายละเอียด :</label>
              <div class="col-sm-8">
                <textarea name="p_detail" id="p_detail" readonly cols="42" rows="6" required><?php echo $row_problem['p_detail'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">ชื่อ :</label>
              <div class="col-sm-8">
                <input type="text" name="p_name" readonly class="form-control" value="<?php echo $row_problem['p_name'] ?>" required autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">E-mail :</label>
              <div class="col-sm-8">
                <input type="email" name="p_email" readonly class="form-control" value="<?php echo $row_problem['p_email'] ?>" placeholder="example@domain.com" required autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">วันที่แจ้ง :</label>
              <div class="col-sm-8">
                <input type="text" name="p_date" readonly class="form-control" value="<?php echo $row_problem['p_date'] ?>" required autocomplete="off">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 control-label">ตอบกลับ :</label>
              <div class="col-sm-8">
                <textarea name="message" id="message" cols="42" rows="6" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-8">
                <input type="submit" name="submit" class="btn btn-success" value="ตอบกลับปัญหา">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
    include('connectdb.php');
    require_once('class.phpmailer.php');

    $p_id = $_GET['p_id'];
    $sql = "SELECT * FROM `problem` WHERE p_id='$p_id'";
    $resmail = mysqli_query($dbcon, $sql);

    $mail = new PHPMailer();
    $mail->CharSet = "utf-8";
    $mail->IsHTML(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = "singmahan1.7@gmail.com"; // GMAIL username
    $mail->Password = "aabb1155"; // GMAIL password
    $mail->From = "singmahan1.7@gmail.com";
    $mail->FromName = "singmahan1.7@gmail.com";  // set from Name
    $mail->Subject = "ตอบกลับปัญหา";
    $mail->Body = "<h3>ตอบกลับปัญหา</h3>";
    $mail->Body .= "<table border='1'>";
    $mail->Body .= "<tr>";
    $mail->Body .= "<th>รายละเอียด</th>";
    $mail->Body .= "</tr>";
    $mail->Body .= "<tr>";
    $mail->Body .= "<td><a href='#'>ดูรายละเอียด</a> </td>";
    $mail->Body .= "</tr>";
    $mail->Body .= "</table>";
    echo $mail->Body;

    $mail->AddAddress($a['email'], $a['name']); // to Address
    $mail->Send();

     ?>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
