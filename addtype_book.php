<?php
    include('connectdb.php');

    $q = "SELECT * FROM tbl_book_type";
    $result = mysqli_query($dbcon, $q);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    include('boostrap.php');
    include('font.php');
    ?>
  </head>
  <body>
    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-12">
          <h1>เพิ่มประเภทหนังสือ</h1>
          <hr>
        </div>
      </div>
    </div></font>
    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-6">
          <form class="" action="addtype_book_db.php" method="post">
            <label>ชื่อประเภท</label>
            <input type="text" name="type_name" class="form-control" value="" required>
            <label>วันที่เพิ่ม</label>
            <input type="date" name="datetime" class="form-control" value="" required>
            <br>
            <input type="submit" name="type_id" class="btn btn-success" value="บันทึกข้อมูล">
          </form>
        </div>
      </div>
    </div></font>

    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-12">
          <h1>แสดงข้อมูลประเภทหนังสือ</h1>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ลำดับที่</th>
              <th class="text-center">ชื่อประเภท</th>
              <th class="text-center">วันที่เพิ่ม</th>
              <th class="text-center">แก้ไข</th>
              <th class="text-center">ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td class="text-center"><?php echo $row['type_id']; ?></td>
              <td><?php echo $row['type_name']; ?></td>
              <td class="text-center"><?php echo $row['datetime']; ?></td>
              <td class="text-center"><a href="edit_type_book.php?type_id=<?php echo $row['type_id']; ?>" class="btn btn-success btn-xs">แก้ไข</a></td>
              <td class="text-center"><a href="delete_type_book.php?type_id=<?php echo $row['type_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');">ลบ</a></td>

            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div></font>
  </body>
</html>
