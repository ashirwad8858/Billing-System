<?php
$quantity=$_GET['quantity'];
$id=$_GET['id'];
$paid_amount=$_GET['paid_amount'];

include('../include/dbconfig.php');

$data=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM products WHERE id='$id'"));

@$per_peice = $paid_amount/$quantity;


if($per_peice>$data[4]) {
	@$profit=$per_peice-$data[4];
	echo '<b style="color:green">Profit of <i class="fa fa-inr" aria-hidden="true">'.$profit.'</i> Per Piece</b>';
}
else {
	$loss=$data[4]-$per_peice;
	echo '<b style="color:red">Loss of <i class="fa fa-inr" aria-hidden="true">'.$loss.'</i> Per Piece</b>';
}

?>