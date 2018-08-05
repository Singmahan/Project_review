<?php
    include('connectdb.php');

    $id = $_GET['id'];
    $qedit = "SELECT * FROM tbl_book WHERE id='$id'";
    $qresult = mysqli_query($dbcon, $qedit);
    $rowedit = mysqli_fetch_array($qresult, MYSQLI_ASSOC);
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
          <h1>แก้ไขข้อมูลหนังสือ</h1>
          <hr>
            <form class="" action="update_book.php" method="post" enctype="multipart/form-data">
              <label>ประเภทสินค้า</label>
              <?php
                  $q = "SELECT * FROM tbl_book_type";
                  $result = mysqli_query($dbcon, $q);
              ?>
              <select class="" name="type_id" required>
                <!-- <option value="">---ประเภทหนังสือ---</option> -->
                <?php while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                  if($row[0] == $rowedit['type_id']){
                    echo "<option value='$row[0]' selected>$row[1]</option>";
                  }else{
                    echo "<option value='$row[0]'>$row[1]</option>";
                  }

              }?>
              </select>
              <br>
              <label>ชื่อหนังสือ</label>
              <input type="text" name="b_name" class="form-control" value="<?php echo $rowedit['b_name']; ?>" required>
              <label>รหัสหนังสือ</label>
              <input type="text" name="b_dcall" class="form-control" value="<?php echo $rowedit['b_dcall']; ?>" required>
              <label>ผู้แต่ง</label>
              <input type="text" name="b_author" class="form-control" value="<?php echo $rowedit['b_author']; ?>" required>
              <label>ครั้งที่พิมพ์</label>
              <input type="text" name="b_print" class="form-control" value="<?php echo $rowedit['b_print']; ?>" required>
              <label>พิมพลักษณ์</label>
              <input type="text" name="b_imprint" class="form-control" value="<?php echo $rowedit['b_imprint']; ?>" required>
              <label>ลักษณะทางกายภาพ</label>
              <input type="text" name="b_physical" class="form-control" value="<?php echo $rowedit['b_physical']; ?>" required>
              <label>หัวเรื่อง</label>
              <input type="text" name="b_heading" class="form-control" value="<?php echo $rowedit['b_heading']; ?>" required>
              <label>ISBN</label>
              <input type="text" name="b_isbn" class="form-control" value="<?php echo $rowedit['b_isbn']; ?>" required>

              <label>รายละเอียด</label>
              <textarea name="b_detail" rows="8" cols="80" class="form-control" value="" required><?php echo $rowedit['b_detail']; ?></textarea>
              <label>เนื้อหาสังเขป</label>
              <textarea name="b_briefly" rows="8" cols="80" class="form-control" value="" required><?php echo $rowedit['b_briefly']; ?></textarea>

              <label>ภาพที่ 1</label>

              <input type="file" name="b_img1" class="form-control" value="" >
              <img src="image/01/<?php echo $rowedit['b_img1']; ?>" width="100px">
              <br>
              <label>ภาพที่ 2</label>
              <input type="file" name="b_img2" class="form-control" value="" >
              <img src="image/02/<?php echo $rowedit['b_img2']; ?>" width="100px">
              <br>

              <label>ภาพที่ 3</label>
              <input type="file" name="b_img3" class="form-control" value="" >
              <img src="image/03/<?php echo $rowedit['b_img3']; ?>" width="100px">
              <br>

              <label>วันที่เพิ่ม</label>
              <input type="date" name="date" class="form-control" value="<?php echo $rowedit['date']; ?>" required>
              <br>


              <input type="hidden" name="b_img1" value="<?php echo $rowedit['b_img1']; ?>">
              <input type="hidden" name="b_img2" value="<?php echo $rowedit['b_img2']; ?>">
              <input type="hidden" name="b_img3" value="<?php echo $rowedit['b_img3']; ?>">

              <input type="hidden" name="id" value="<?php echo $rowedit['id']; ?>">
              <input type="submit" name="submit"class="btn btn-success" value="แก้ไขข้อมูล">
              <hr>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
