<?php $title='Today sale report'; include('include/header.php');  ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">View Products</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
								<div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr bgcolor="yellow">
                                            <th>Product Name</th>
											<th>Sale Type</th>
                                            <th>Product Per Piece Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Profit Per Piece</th>
                                            <th>Profit Over This Transaction</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
								<tbody>
								
								
								
								<?php
									include("include/dbconfig.php");
									$date=date("Y-m-d");;
									$data=mysqli_query($conn,"SELECT * FROM sale WHERE  date >= '$date' AND date <= '$date' ORDER BY date AND time");
									while($row=mysqli_fetch_object($data))
									{
										$product_id=$row->product_id;
										$product_per_piece_price=$row->product_per_piece_price;
										$sale_type=$row->sale_type;
										$quantity=$row->quantity;
										$total=$row->total;
										$profit_per_piece=$row->profit_per_piece;
										$profit_over_this_transaction=$row->profit_over_this_transaction;
										$date=$row->date;
										
										$product_detail=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM products WHERE id='$product_id'"));
										echo '<tr>
										<td align="center">'.$product_detail[1].'</td>
										<td align="center">'.$sale_type.'</td>
										<td align="center"><i class="fa fa-inr" aria-hidden="true">'.$product_per_piece_price.'</i></td>
										
										<td align="center">'.$quantity.'</td>
										<td align="center"><i class="fa fa-inr" aria-hidden="true">'.$total.'</i></td>
										<td align="center"><i class="fa fa-inr" aria-hidden="true">'.$profit_per_piece.'</i></td>
										<td align="center"><i class="fa fa-inr" aria-hidden="true">'.$profit_over_this_transaction.'</i></td>
										<td align="center">'.$date.'</td>
										</tr>';
										@$total_sale=$total_sale+$total;
										@$total_profit_over_this_transaction=round($total_profit_over_this_transaction+$profit_over_this_transaction);
									}
									?>
								<tr bgcolor="yellow" align="center">
								<td colspan="4"><b>Total Report</b></td>
								<td colspan="2" align="left"><i class="fa fa-inr" aria-hidden="true"><?php echo @$total_sale; ?></i></td>
			<td  align="center"><i class="fa fa-inr" aria-hidden="true"><?php echo @$total_profit_over_this_transaction; ?></i></td>
								<td><b>&nbsp;</b></td>
								</tr>
				

									</tbody>
                                </table>
                            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

<?php include('include/footer.php');  ?>
    


</body>
</html>
