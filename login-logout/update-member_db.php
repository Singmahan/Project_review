<?php
    include('connectdb.php');

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $q = "UPDATE member SET username='$username',password='$password',name='$name',email='$email' WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('แก้ไขข้อมูลสมาชิกเรียบร้อย');";
      echo "window.location ='admin_member.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถแก้ไขข้อมูลสมาชิกได้ !');";
      echo "window.location ='admin_member.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
