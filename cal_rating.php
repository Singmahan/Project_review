<?php
include('connectdb.php');

$rating=$_POST['rating'];
$id=$_POST['id'];
$og_rating=$_POST['og_rating'];
if($og_rating!=0){
    $rating = ($rating + $og_rating)/2;
}
$q = "UPDATE tbl_book SET rating='$rating' WHERE id='$id'";
$result = mysqli_query($dbcon, $q);
echo $rating;
?>