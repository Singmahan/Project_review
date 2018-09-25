<?php
    include('connectdb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $q = "INSERT INTO member(username, password, name, email) VALUES ('$username','$password','$name','$email')";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('เพิ่มสมาชิกเรียบร้อย');";
      echo "window.location ='admin_member.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถเพิ่มสมาชิกได้ !');";
      echo "window.location ='admin_member.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
