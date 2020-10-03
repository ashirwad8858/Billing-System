<?php $title='Add Stock'; include('include/header.php');  ?>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Enter Quantity to add in Stock</th>
                                            <th>Response</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
								<tbody>
								
								
								
								<?php
									include("include/dbconfig.php");
									$data=mysqli_query($conn,"SELECT * FROM products ORDER BY product_name");
									while($row=mysqli_fetch_object($data))
									{
										$id=$row->id;
										$product_name=$row->product_name;
										$retail_price=$row->retail_price;
										$wholesale_price=$row->wholesale_price;
										$our_price=$row->our_price;
										$total_stock=$row->total_stock;
										echo '<tr>
										<form method="get" id="form'.$id.'">
										<input type="number" name="old_stock" value="'.$total_stock.'" hidden/>
										<input type="number" name="product_id" value="'.$id.'" hidden/>
										<td>'.$id.'</td>
										<td><a href="update_product_detail.php?id='.$id.'" target="_blank">'.$product_name.'</a></td>
										<td><input type="number" name="entered_stock" id="entered_stock'.$id.'"/></td>
										<td><p id="response'.$id.'"></p></td>
										<td><input type="submit" name="" value="Submit" id="button'.$id.'" class="btn btn-success"/></td>
										</form>
										</tr>';
										echo '<script type = "text/javascript">
												   $(document).ready(function()
												   {
													   $(\'#button'.$id.'\').click(function(event)
													   {
													   event.preventDefault();
														   $.ajax
														   (
															   {
																   url : "ajax/update_stock.php",
																   method : "post",
																   data : $("#form'.$id.'").serialize(), 
																   dataType : "text",
																   beforeSend: function() {
															   $("#response'.$id.'").html(\'<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>\').show();
																},
																   success: function(data){
																   $("#response'.$id.'").html(data).show();
																	$("#entered_stock'.$id.'").val("");															
															   }
															   }
														   )
													   }
												   )
												   }
												   )
										</script>';
									}
									?>

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
