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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .checked {
          color: orange;
      }
    </style>
  </head>
<body>
    <div align="center">
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

    $currentPage = $_SERVER["PHP_SELF"];
    ?>
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

$queryString_showbook = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_showbook") == false &&
        stristr($param, "totalRows_showbook") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_showbook = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_showbook = sprintf("&totalRows_showbook=%d%s", $totalRows_showbook, $queryString_showbook);

    $queryString_showbook = "";
    if (!empty($_SERVER['QUERY_STRING'])) {
      $params = explode("&", $_SERVER['QUERY_STRING']);
      $newParams = array();
      foreach ($params as $param) {
        if (stristr($param, "pageNum_showbook") == false &&
            stristr($param, "totalRows_showbook") == false) {
          array_push($newParams, $param);
        }
      }
      if (count($newParams) != 0) {
        $queryString_showbook = "&" . htmlentities(implode("&", $newParams));
      }
    }
    $queryString_showbook = sprintf("&totalRows_showbook=%d%s", $totalRows_showbook, $queryString_showbook);
    ?>
      <?php do { ?>
        <!-- <div class="col-xs-6 col-sm-4 col-md-3" align="center"> -->
      </div>

      <div class="col-sm-3" align="center">
        <div align="center">
          <a href="book_detail.php?id=<?php echo $row_showbook['id']; ?>&<?php echo $row_showbook['b_name']; ?>"><img src="image/01/<?php echo $row_showbook['b_img1']; ?>" width="80%" style="padding-bottom:10px" class="img-thumbnail"/></a>

          <?php echo $row_showbook['b_name']; ?><br>

          <?php
            for($i = 1;$i<=$row_showbook['rating'];$i++){ ?>
          <span class="fa fa-star checked"></span>
          <?php }
            $dropRating = 5-$row_showbook['rating'];
            for($i = 1;$i<=$dropRating;$i++){ ?>
          <span class="fa fa-star"></span>
          <?php } ?>
        </div>
        <p align="center">
          <a href="book_detail.php?id=<?php echo $row_showbook['id']; ?>&<?php echo $row_showbook['b_name']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> ดูรายละเอียด</a>
        </p>


        <div align="center"><br>
          <br>

        </div>
    </div>
      <div align="center">
        <?php } while ($row_showbook = mysql_fetch_assoc($showbook)); ?>
      <?php
    mysql_free_result($showbook);
    ?>
        <div class="col-md-12">
          <table border="0">
            <tr>
              <td><?php if ($pageNum_showbook > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_showbook=%d%s", $currentPage, 0, $queryString_showbook); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-fast-backward"></span> หน้าแรก</a>
                  <?php } // Show if not first page ?></td>
              <td><?php if ($pageNum_showbook > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_showbook=%d%s", $currentPage, max(0, $pageNum_showbook - 1), $queryString_showbook); ?>" class="btn btn-primary "><span class="glyphicon glyphicon-backward"></span> ก่อนหน้า</a>
                  <?php } // Show if not first page ?></td>
              <td><?php if ($pageNum_showbook < $totalPages_showbook) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_showbook=%d%s", $currentPage, min($totalPages_showbook, $pageNum_showbook + 1), $queryString_showbook); ?>" class="btn btn-primary "> ถัดไป <span class="glyphicon glyphicon-forward"></span></a>
                  <?php } // Show if not last page ?></td>
              <td><?php if ($pageNum_showbook < $totalPages_showbook) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_showbook=%d%s", $currentPage, $totalPages_showbook, $queryString_showbook); ?>" class="btn btn-primary">หน้าสุดท้าย <span class="glyphicon glyphicon-fast-forward"></span></a>
                  <?php } // Show if not last page ?></td>

              </tr>

          </table>
            <hr>
        </div>
    </div>
</body>
</html>
