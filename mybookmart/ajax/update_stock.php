<?php
include('../include/dbconfig.php');
$old_stock=$_REQUEST['old_stock'];
$product_id=$_REQUEST['product_id'];
$entered_stock=$_REQUEST['entered_stock'];
$date=date("Y-m-d");
$total_stock=$old_stock+$entered_stock;

if(mysqli_query($conn,"INSERT INTO stock(product_id,quantity,date) VALUES('$product_id','$entered_stock','$date')"))
						{
						if(mysqli_query($conn,"UPDATE products SET total_stock='$total_stock' WHERE id='$product_id'"))
						{
						echo 'Sucessfully Updated';
						}
						else 
						{
							echo 'Unable to update Total Stock';
						}
						}
						else 
						{
							echo 'Inserted Into Stock But Cant Update Total Stock';
						}


?>