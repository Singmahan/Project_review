<?php
    include('connectdb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $q = "INSERT INTO admin(username,password,name) VALUES ('$username','$password','$name')";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('เพิ่ม Admin เรียบร้อย');";
      echo "window.location ='add_admin.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถเพิ่ม Admin ได้ !');";
      echo "window.location ='add_admin.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
