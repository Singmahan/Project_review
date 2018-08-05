<?php
    include('connectdb.php');

    $id = $_POST['id'];
    $b_name = $_POST['b_name'];
    $b_dcall = $_POST['b_dcall'];
    $b_author = $_POST['b_author'];
    $b_print = $_POST['b_print'];
    $b_imprint = $_POST['b_imprint'];
    $b_physical = $_POST['b_physical'];
    $b_heading = $_POST['b_heading'];
    $b_isbn = $_POST['b_isbn'];
    $b_detail = $_POST['b_detail'];
    $b_briefly = $_POST['b_briefly'];
    $date = $_POST['date'];
    $type_id = $_POST['type_id'];

    $q = "UPDATE tbl_book SET b_name='$b_name',b_dcall='$b_dcall',b_author='$b_author',b_print='$b_print',b_imprint='$b_imprint',
          b_physical='$b_physical',b_heading='$b_heading',b_isbn='$b_isbn',b_detail='$b_detail',b_briefly='$b_briefly',date='$date',type_id='$type_id' WHERE id='$id'";
    $result = mysqli_query($dbcon, $q);

    if($result) {
			echo "<script>";
			echo "alert('แก้ไขข้อมูลหนังสือเรียบร้อย');";
			echo "window.location ='show_book.php'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ไม่สามารถแก้ไขข้อมูลหนังสือได้ !');";
			echo "window.location ='show_book.php'; ";
			echo "</script>";
		}
    mysqli_close($dbcon);

?>
