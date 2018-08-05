<?php
    include('connectdb.php');

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
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-14">
            <?php include('menu.php');?>
          </div>
        </div>
      </div>
    <div class="container"><font style="font-family: 'Prompt', sans-serif;">
      <div class="row">
        <div class="col-md-6">
          <h1>เพิ่มข้อมูลหนังสือ</h1>
          <hr>
            <form class="" action="add_book_db.php" method="post" enctype="multipart/form-data">
              <label>ประเภทสินค้า</label>
              <?php
                  $q = "SELECT * FROM tbl_book_type";
                  $result = mysqli_query($dbcon, $q);
              ?>
              <select class="" name="type_id" required>
                <option value="">---ประเภทหนังสือ---</option>
                <?php while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                  echo "<option value='$row[0]'>$row[1]</option>";
              }?>
              </select>
              <br>
              <label>ชื่อหนังสือ</label>
              <input type="text" name="b_name" class="form-control" value="" required>
              <label>รหัสหนังสือ</label>
              <input type="text" name="b_dcall" class="form-control" value="" required>
              <label>ผู้แต่ง</label>
              <input type="text" name="b_author" class="form-control" value="" required>
              <label>ครั้งที่พิมพ์</label>
              <input type="text" name="b_print" class="form-control" value="" required>
              <label>พิมพลักษณ์</label>
              <input type="text" name="b_imprint" class="form-control" value="" required>
              <label>ลักษณะทางกายภาพ</label>
              <input type="text" name="b_physical" class="form-control" value="" required>
              <label>หัวเรื่อง</label>
              <input type="text" name="b_heading" class="form-control" value="" required>
              <label>ISBN</label>
              <input type="text" name="b_isbn" class="form-control" value="" required>
              <label>รายละเอียด</label>
              <textarea name="b_detail" rows="8" cols="80" class="form-control" required></textarea>

              <label>เนื้อหาสังเขป</label>
              <textarea name="b_briefly" rows="8" cols="80" class="form-control" required></textarea>

              <label>ภาพที่ 1</label>
              <input type="file" name="b_img1" class="form-control" value="" required>
              <label>ภาพที่ 2</label>
              <input type="file" name="b_img2" class="form-control" value="" required>
              <label>ภาพที่ 3</label>
              <input type="file" name="b_img3" class="form-control" value="" required>
              <label>วันที่เพิ่ม</label>
              <input type="date" name="date" class="form-control" value="" required>
              <br>
              <input type="submit" name="submit"class="btn btn-success" value="เพิ่มข้อมูล">
              <hr>
            </form>
        </div>
      </div>
    </div></font>
  </body>
</html>
