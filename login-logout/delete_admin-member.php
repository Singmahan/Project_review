<?php
    include('connectdb.php');

    $id = $_GET['id'];

    $q = "DELETE FROM member WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('ลบสมาชิกเรียบร้อย');";
      echo "window.location ='admin_member.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถลบสมาชิกได้ !');";
      echo "window.location ='admin_member.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
