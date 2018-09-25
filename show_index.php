<?php
    include('connectdb.php');

    $sql = "SELECT * FROM tbl_book";
    $result = mysqli_query($dbcon, $sql);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">

    <style>
      .checked {
          color: orange;
      }
      .container{
        font-family: 'Prompt', sans-serif;
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <?php
              include('connectdb.php');

              $pro_search = $_POST['pro_search'];
              $p = '%'.$pro_search.'%';
              $sql = "SELECT * FROM tbl_book WHERE b_name LIKE '$p'";
              $result = mysqli_query($dbcon, $sql);

           ?>
           <div class="col-md-12">
             <div class="panel panel-info">
               <div class="panel-heading">
                 <div class="form-group text-right">
                   <form class="" action="index.php" method="post">
                     <label>ค้นหาหนังสือ :</label>
                     <input type="text" name="pro_search" value="" autocomplete="off">
                     <input type="submit" name="submit" class="btn btn-info btn-xs" value="ค้นหา">
                   </form>
                 </div>
               </div>
             </div>

             <table>
                   <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                   <tr>
                     <div class="col-sm-3" align="center">
                     <div align="center">
                       <a href="detail_book.php?id=<?php echo $row['id']; ?>">
                         <img src="image/01/<?php echo $row['b_img1']; ?>" width="80%" style="padding-bottom:20px" class="img-thumbnail"/>
                       </a>
                       <p>
                       <?php
                         for($i = 1;$i<=$row['rating'];$i++){ ?>
                       <span class="fa fa-star checked"></span>
                       <?php }
                         $dropRating = 5-$row['rating'];
                         for($i = 1;$i<=$dropRating;$i++){ ?>
                       <span class="fa fa-star"></span>
                       <?php } ?>
                       <br>
                     </p>

                         <p><?php echo $row['b_name']; ?></p>
                     </div>
                     <p>
                       <a href="detail_book.php?id=<?php echo $row['id']; ?>&<?php echo $row['b_name']; ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span> ดูรายละเอียด</a>
                     </p>
                     <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b117b1a825c097f"></script>
                   </div>
                   </tr>
                 <?php } ?>
             </table>
          </div>
        </div>
      </div>
    </div>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b117b1a825c097f"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
