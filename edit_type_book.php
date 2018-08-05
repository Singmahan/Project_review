<?php
    include('connectdb.php');

    $type_id = $_GET['type_id'];
    $q = "SELECT * FROM tbl_book_type WHERE type_id='$type_id'";
    $result = mysqli_query($dbcon, $q);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include('boostrap.php');?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>แก้ไขข้อมูลประเภทหนังสือ</h1>
          <br>
          <form class="" action="update_typebook.php" method="post">
            <label>ชื่อประเภท</label>
            <input type="text" name="type_name" class="form-control" value="<?php echo $row['type_name']; ?>" required>
            <label>วันที่เพิ่ม</label>
            <input type="date" name="datetime" class="form-control" value="<?php echo $row['datetime']; ?>" required>
            <br>
            <input type="hidden" name="type_id" value="<?php echo $row['type_id']; ?>">
            <input type="submit" name="submit" class="btn btn-success" value="แก้ไขข้อมูล">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
