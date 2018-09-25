<?php
    include('connectdb.php');

    $tb_username = $_POST['tb_username'];
    $tb_password = $_POST['tb_password'];
    $tb_name = $_POST['tb_name'];
    $tb_email = $_POST['tb_email'];

    $check = "SELECT * FROM tb_member WHERE tb_username='$tb_username'";
    $result1 = mysqli_query($dbcon, $check);
    $num = mysqli_num_rows($result1);

    if($num > 0){
      echo "<script>";
      echo "alert('ชื่อนี้มีผู้ใช้งานแล้ว กรุณาใช้ชื่ออื่น');";
      echo "window.location ='register.php'; ";
      echo "</script>";
    }else {

    $sql = "INSERT INTO tb_member(tb_username, tb_password, tb_name, tb_email) VALUES ('$tb_username','$tb_password','$tb_name','$tb_email')";
    $result = mysqli_query($dbcon, $sql);
  }

    if($result) {
      echo "<script>";
      echo "alert('สมัครสมาชิกเรียบร้อย');";
      echo "window.location ='index.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถสมัครสมาชิกได้ !');";
      echo "window.location ='index.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);


?>
