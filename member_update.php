<?php
        include('connectdb.php');

        $id = $_POST['id'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $sql = "UPDATE login_member SET password='$password',name='$name', email='$email' WHERE id='$id'";
        $result = mysqli_query($dbcon, $sql);

        if($result) {
    			echo "<script>";
    			echo "alert('แก้ไขข้อมูลเรียบร้อย');";
    			echo "window.location ='data_member.php'; ";
    			echo "</script>";
    		} else {

    			echo "<script>";
    			echo "alert('ไม่สามารถแก้ไขข้อมูลได้ !');";
    			echo "window.location ='data_member.php'; ";
    			echo "</script>";
    		}
        mysqli_close($dbcon);





 ?>
