<?php
$quantity=$_GET['quantity'];
$sale_type=$_GET['sale_type'];
$id=$_GET['id'];

include('../include/dbconfig.php');

$data=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM products WHERE id='$id'"));


		if($sale_type=='per_piece') {
							echo $total=$quantity*$data[2];				
		} else if($sale_type=='wholesale') {
								echo $total=$quantity*$data[3];					
		}

?>