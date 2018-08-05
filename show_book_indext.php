<?php require_once('Connections/condb.php'); ?>
<?php include('font.php');?>
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

$maxRows_showbook = 8;
$pageNum_showbook = 0;
if (isset($_GET['pageNum_showbook'])) {
  $pageNum_showbook = $_GET['pageNum_showbook'];
}
$startRow_showbook = $pageNum_showbook * $maxRows_showbook;

mysql_select_db($database_condb, $condb);
$query_showbook = "SELECT * FROM tbl_book";
$query_limit_showbook = sprintf("%s LIMIT %d, %d", $query_showbook, $startRow_showbook, $maxRows_showbook);
$showbook = mysql_query($query_limit_showbook, $condb) or die(mysql_error());
$row_showbook = mysql_fetch_assoc($showbook);

if (isset($_GET['totalRows_showbook'])) {
  $totalRows_showbook = $_GET['totalRows_showbook'];
} else {
  $all_showbook = mysql_query($query_showbook);
  $totalRows_showbook = mysql_num_rows($all_showbook);
}
$totalPages_showbook = ceil($totalRows_showbook/$maxRows_showbook)-1;
?>
<?php do { ?>
  <div class="col-xs-6 col-sm-4 col-md-3" style="text-align:center"><font style="font-family: 'Prompt', sans-serif;">
  <a href="book_detail.php?id=<?php echo $row_showbook['id']; ?>&<?php echo $row_showbook['b_name']; ?>"><img src="image/01/<?php echo $row_showbook['b_img1']; ?>" width="100%" style="padding-bottom:20px"/></a>

  <h4><?php echo $row_showbook['b_name']; ?></h4>
  <p>
  <a href="book_detail.php?id=<?php echo $row_showbook['id']; ?>&<?php echo $row_showbook['b_name']; ?>" class="btn btn-primary">ดูรายละเอียด</a>
  </p>


    <br><br>
  </div></font>
  <?php } while ($row_showbook = mysql_fetch_assoc($showbook)); ?>
<?php
mysql_free_result($showbook);
?>
