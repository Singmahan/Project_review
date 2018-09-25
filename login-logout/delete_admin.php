<?php
    include('connectdb.php');

    $id = $_GET['id'];

    $q = "DELETE FROM admin WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('ลบ Admin เรียบร้อย');";
      echo "window.location ='add_admin.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถ ลบ Admin ได้ !');";
      echo "window.location ='add_admin.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
