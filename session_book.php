<?php
      session_start();
      $session_id = $_SESSION['id'];
      $query_book = "SELECT * FROM tbl_book WHERE id='$session_id'";
      $result_book = mysqli_query($dbcon, $query_book);
      if($result_book){
        $row_book = mysqli_fetch_array($result_book, MYSQLI_ASSOC);
        $s_book = $row_book['b_name'];
      }
 ?>
