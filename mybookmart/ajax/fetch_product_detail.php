<?php
$id=$_REQUEST['id'];
include("../include/dbconfig.php");
$id=$_REQUEST['id'];
									$data=mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");
									while($row=mysqli_fetch_object($data))
									{
										$product_name=$row->product_name;
										$retail_price=$row->retail_price;
										$wholesale_price=$row->wholesale_price;
										$our_price=$row->our_price;
										
	echo '<b style="color:green">Product Name : </b>'.$product_name;
	echo '<br><b style="color:green">Product Retail Price : </b><i class="fa fa-inr" aria-hidden="true">'.$retail_price.'</i>';
	echo '<br><b style="color:green">Product Wholesale Price : </b><i class="fa fa-inr" aria-hidden="true">'.$wholesale_price.'</i>';
}
?>