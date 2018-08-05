<?php
    include('connectdb.php');

    $q = "SELECT * FROM tbl_book INNER JOIN tbl_book_type ON tbl_book.type_id=tbl_book_type.type_id";
    $result = mysqli_query($dbcon, $q);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include('boostrap.php');?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-14">
          <?php include('menu.php');?>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3>ข้อมูลหนังสือ</h3>
          <hr>
          <a href="add_book.php" class="btn btn-primary">+ เพิ่มหนังสือ</a>
          <br><br>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="rows">
        <div class="col-xs-12">
          <table class="table table-bordered">
            <tr>
              <th class="text-center">ที่</th>
              <th class="text-center">ชื่อหนังสือ</th>
              <th class="text-center">ประเภท</th>
              <th class="text-center">รหัส</th>
              <th class="text-center">ผู้แต่ง</th>
              <th class="text-center">ครั้งที่พิมพ์</th>
              <th class="text-center">พิมพลักษณ์</th>
              <th class="text-center">ลักษณะทางกายภาพ</th>
              <th class="text-center">หัวเรื่อง</th>
              <th class="text-center">ISBN</th>
              <th class="text-center">รายละเอียด</th>
              <th class="text-center">เนื้อหาสังเขป</th>
              <th class="text-center">ภาพ 1</th>
              <th class="text-center">ภาพ 2</th>
              <th class="text-center">ภาพ 3</th>
              <th class="text-center">วันที่เพิ่ม</th>
              <th class="text-center">แก้ไข</th>
              <th class="text-center">ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['b_name']; ?></td>
              <td><?php echo $row['type_name']; ?></td>
              <td><?php echo $row['b_dcall']; ?></td>
              <td><?php echo $row['b_author']; ?></td>
              <td><?php echo $row['b_print']; ?></td>
              <td><?php echo $row['b_imprint']; ?></td>
              <td><?php echo $row['b_physical']; ?></td>
              <td><?php echo $row['b_heading']; ?></td>
              <td><?php echo $row['b_isbn']; ?></td>
              <td><?php echo $row['b_detail']; ?></td>
              <td><?php echo $row['b_briefly']; ?></td>
              <td><img src="image/01/<?php echo $row['b_img1']; ?>" width="50px" /></td>
              <td><img src="image/02/<?php echo $row['b_img2']; ?>" width="50px" /></td>
              <td><img src="image/03/<?php echo $row['b_img3']; ?>" width="50px" /></td>
              <td><?php echo $row['date']; ?></td>
              <td><a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">แก้ไข</a></td>
              <td><a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('ต้องการลบข้อมูล จริงหรือ ?');">ลบ</a></td>

            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
