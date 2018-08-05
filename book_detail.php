<?php require_once('Connections/condb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_showbook = "-1";
if (isset($_GET['id'])) {
  $colname_showbook = $_GET['id'];
}
mysql_select_db($database_condb, $condb);
$query_showbook = sprintf("SELECT * FROM tbl_book WHERE id = %s", GetSQLValueString($colname_showbook, "int"));
$showbook = mysql_query($query_showbook, $condb) or die(mysql_error());
$row_showbook = mysql_fetch_assoc($showbook);
$totalRows_showbook = mysql_num_rows($showbook);

//update book view
$id = $row_showbook['id'];
$p_view = $row_showbook['p_view'];
$count = $p_view + 1;

$sql= "UPDATE tbl_book SET  p_view=$count WHERE id = $id";
	mysql_db_query($database_condb,$sql);
//

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
    color: orange;
}
</style>
    <title></title>
    <?php
    include('boostrap.php');
    include('font.php');
    ?>

  </head>
  <body>
	<div class="container-fluid">
      <div class="row">
        <div class="col-md-14">
          <?php include('menu.php');?>
          <?php mysql_free_result($showbook);?>
        </div>
      </div>
    </div>
    <!-- start show book detail -->
    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row" align="left">
        <div class="col-xs-12 col-sm-4 col-md-3">
          <!-- show book img -->
          <img src="image/01/<?php echo $row_showbook['b_img1']; ?>" width="100%" class="img-thumbnail">
        </div>

        <div class="col-xs-12 col-sm-8 col-md-9">
          <!-- show book detail -->
        <h4><font color="#0000FF">ชื่อหนังสือ :</font>
		<?php echo $row_showbook['b_name']; ?></h4>
		<h4><font color="#0000FF">รหัสหนังสือ : </font>
		<?php echo $row_showbook['b_dcall']; ?></h4>
        <h4><font color="#0000FF">ผู้แต่ง : </font>
		<?php echo $row_showbook['b_author']; ?></h4>
        <h4><font color="#0000FF">ครั้งที่พิมพ์ : </font>
		<?php echo $row_showbook['b_print']; ?></h4>
        <h4><font color="#0000FF">พิมพลักษณ์ : </font>
		<?php echo $row_showbook['b_imprint']; ?></h4>
        <h4><font color="#0000FF">ลักษณะทางกายภาพ : </font>
		<?php echo $row_showbook['b_physical']; ?></h4>
        <h4><font color="#0000FF">หัวเรื่อง : </font>
		<?php echo $row_showbook['b_heading']; ?></h4>
        <h4><font color="#0000FF">ISBN : </font>
		<?php echo $row_showbook['b_isbn']; ?></h4>
        <h4><font color="#0000FF">รายละเอียด </font><br>
		<?php echo $row_showbook['b_detail']; ?></h4>
        <h4><font color="#0000FF">เนื้อหาสังเขป </font><br>
		<?php echo $row_showbook['b_briefly']; ?></h4>
        <br>
      <?php 
        for($i = 1;$i<=$row_showbook['rating'];$i++){ ?>
          <span class="fa fa-star checked"></span>
        <?php } 
        $dropRating = 5-$row_showbook['rating'];
        for($i = 1;$i<=$dropRating;$i++){ ?>
          <span class="fa fa-star"></span>
        <?php } ?>
        <h5><font color="#0000FF">คะแนนรีวิว</font>
    <?php echo $row_showbook['rating']; ?>/5</h2><br>

    <form action="cal_rating.php" method="post">
    ให้คะแนน
    <input type="radio" name="rating" value="0">0 
    <input type="radio" name="rating" value="1">1 
    <input type="radio" name="rating" value="2">2 
    <input type="radio" name="rating" value="3">3 
    <input type="radio" name="rating" value="4">4 
    <input type="radio" name="rating" value="5">5 
    <input type="hidden" name="id" value="<?php echo $row_showbook['id']; ?>" >
    <input type="hidden" name="og_rating" value="<?php echo $row_showbook['rating']; ?>" >
    <button type="submit" class="btn btn-primary">ให้คะแนน</button>
    </form>
       <span class="glyphicon glyphicon-eye-open"></span>
		<span class="badge"><?php echo $row_showbook['p_view']; ?></span> ครั้ง <br>

    <p align="right">
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_inline_share_toolbox_r64r"></div>
    </p>
    </div>
  </div>
</div></font>
    <!-- end show book detail -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-14">
          <?php include('script.php');?>
        </div>
      </div>
    </div>
    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-12">
          <h1>เพิ่มบทวิเคราะห์</h1>
          <h3><a href="#" class="btn btn-success">เพิ่มบทวิเคราะห์</a></h3>
        </div>
      </div>
    </div></font>
  </body>
</html>
