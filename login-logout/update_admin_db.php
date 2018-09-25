<?php
    include('connectdb.php');

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $q = "UPDATE admin SET username='$username',password='$password', name='$name' WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
      echo "<script>";
      echo "alert('Update Admin เรียบร้อย');";
      echo "window.location ='add_admin.php'; ";
      echo "</script>";
    } else {

      echo "<script>";
      echo "alert('ไม่สามารถ Update Admin ได้ !');";
      echo "window.location ='add_admin.php'; ";
      echo "</script>";
    }
    mysqli_close($dbcon);
?>
