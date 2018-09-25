<?php
    include('connectdb.php');

    $tb_id = $_GET['tb_id'];

    $sql = "DELETE FROM tb_member WHERE tb_id='$tb_id'";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
      echo "<script>";
      echo "alert('ลบสมาชิกเรียบร้อย');";
      echo "window.location ='member.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถลบสมาชิกได้ !');";
      echo "window.location ='member.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
 ?>
