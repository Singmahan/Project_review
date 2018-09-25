<?php
    include('connectdb.php');

    $c_name = $_POST['c_name'];
    $c_book = $_POST['c_book'];

    $c_detail = $_POST['c_detail'];

    $sql = "INSERT INTO comment(c_detail,c_name,c_book) VALUES ('$c_detail','$c_name','$c_book')";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
			echo "<script>";
			echo "alert('เพิ่มบทวิเคราะห์เรียบร้อย');";
			echo "window.location ='index.php'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ไม่สามารถเพิ่มบทวิเคราะห์ได้ !');";
			echo "window.location ='index.php'; ";
			echo "</script>";
		}
    mysqli_close($dbcon);

 ?>
