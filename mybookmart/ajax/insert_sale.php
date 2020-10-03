<?php session_start();
					include('../include/dbconfig.php');
					$id=$_REQUEST['id'];
					$product_id_by_name=$_REQUEST['product_id_by_name'];
					$sale_type=$_REQUEST['sale_type'];
					$quantity=$_REQUEST['quantity'];
					$amount_paid=$_REQUEST['amount_paid'];
					$customer_name=$_REQUEST['customer_name'];
					$customer_id=$_REQUEST['customer_id'];
					$random_no=$_REQUEST['random_no'];
					
					
					if(isset($_SESSION['random_no'])) {
						$a=$_SESSION['random_no'];
						if($a!=$random_no) {
							mysqli_query($conn,"INSERT INTO customers(id,customer_name) VALUES('$customer_id','$customer_name')");
						}
					} else {
						$_SESSION['random_no']=$random_no=$_REQUEST['random_no'];
						mysqli_query($conn,"INSERT INTO customers(id,customer_name) VALUES('$customer_id','$customer_name')");
					}

				
					
					$date=date("Y-m-d");
					$time= date("H:i:s");

					
					if($id==$product_id_by_name) {
						
					$product_detail=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM products WHERE id='$id'"));
					
					if($sale_type=='per_piece') {
						$product_per_piece_price=$amount_paid/$quantity;
						$total=$product_per_piece_price*$quantity;
						$profit_per_piece=($amount_paid/$quantity)-$product_detail[4];
						$profit_over_this_transaction=$profit_per_piece*$quantity;
					} 
					else if($sale_type=='wholesale') {
						$product_per_piece_price=$amount_paid/$quantity;
						$total=$product_per_piece_price*$quantity;
						$profit_per_piece=($amount_paid/$quantity)-$product_detail[4];
						$profit_over_this_transaction=$profit_per_piece*$quantity;
					}
					
					
						if(mysqli_query($conn,"INSERT INTO sale(product_id,customer_id,product_per_piece_price,sale_type,quantity,total,profit_per_piece,profit_over_this_transaction,date,time) 
						VALUES('$id','$customer_id','$product_per_piece_price','$sale_type','$quantity','$amount_paid','$profit_per_piece','$profit_over_this_transaction','$date','$time')"))
						{
							$data=mysqli_fetch_row(mysqli_query($conn,"SELECT total_stock FROM products WHERE id='$id'"));
							$new_stock=$data[0]-$quantity;
							mysqli_query($conn,"UPDATE products SET total_stock='$new_stock' WHERE id='$id'");
							
							 $i=0;
								$record=mysqli_query($conn,"SELECT * FROM sale WHERE customer_id='$customer_id' ORDER BY id");
								while($rows=mysqli_fetch_object($record))
								{
									$i++;
									$product_id=$rows->product_id;
									$product_per_piece_price=$rows->product_per_piece_price;
									$quantity=$rows->quantity;
									$total=$rows->total;
									
									$data=mysqli_fetch_row(mysqli_query($conn,"SELECT product_name FROM products WHERE id='$product_id'"));
									
								echo '<tr>
									<td>'.$i.'</td>
									<td>'.$data[0].'</td>
									<td><i class="fa fa-inr" aria-hidden="true">'.$product_per_piece_price.'</i></td>
									<td>'.$quantity.'</td>
									<td><i class="fa fa-inr" aria-hidden="true">'.$total.'</i></td>
									</tr>';
									@$total_amount=$total_amount+$total;
									
								} 
					echo '<tr bgcolor="yellow" ><th colspan="4" >Total</th><th><i class="fa fa-inr" aria-hidden="true">'.$total_amount.'</i></th></tr>';

						}
						else
						{
						echo 'Unable to add Right Now';
						}
					
					}

?>