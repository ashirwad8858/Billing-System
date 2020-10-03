<?php $title='View products'; include('include/header.php');  ?>
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
                                            <th>Retail Price</th>
                                            <th>Wholesale Price</th>
                                            <th>Our Price</th>
                                            <th>In Stock</th>
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
										<td>'.$id.'</td>
										<td><a href="update_product_detail.php?id='.$id.'" target="_blank" style="color:black">'.$product_name.'</a></td>
										<td><i class="fa fa-inr" aria-hidden="true">'.$retail_price.'</i></td>
										<td><i class="fa fa-inr" aria-hidden="true">'.$wholesale_price.'</i></td>
										<td><i class="fa fa-inr" aria-hidden="true">'.$our_price.'</i></td>
										<td>'.$total_stock.'</td>
										</tr>';
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
