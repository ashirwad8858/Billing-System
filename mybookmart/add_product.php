<?php $title='Add Product'; include('include/header.php');  ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="font-size:35px">Add product</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
				if(isset($_REQUEST['submit'])) {
					
					$product_name=$_REQUEST['product_name'];
					$product_retail_price=$_REQUEST['product_retail_price'];
					$product_wholesale_price=$_REQUEST['product_wholesale_price'];
					$our_price=$_REQUEST['our_price'];
					$stock=$_REQUEST['stock'];
					$date=date("Y-m-d");
					
					include('include/dbconfig.php');
					if(mysqli_query($conn,"INSERT INTO products(product_name,retail_price,wholesale_price,our_price,total_stock) VALUES('$product_name','$product_retail_price','$product_wholesale_price','$our_price','$stock')"))
					{
						$product_detail=mysqli_fetch_row(mysqli_query($conn,"SELECT id FROM products ORDER BY id DESC LIMIT 1"));
						if(mysqli_query($conn,"INSERT INTO stock(product_id,quantity,date) VALUES('$product_detail[0]','$stock','$date')"))
						{
						echo '<script>alert("Sucessfully Added");</script>';
						}
						else 
						{
							echo '<script>alert("Product Added but Stock Not Updated");</script>';
						}
					}
					else
					{
						echo '<script>alert("Unable to add Right Now");</script>';
					}
				}
				?>
                <form  method="post">
                                        
                                 <div class="form-group">
                                            <label style="font-size:20px">Product Name</label>
                                            <input class="form-control" type="text" name="product_name" required>
                                        </div>
                                 <div class="form-group">
                                            <label style="font-size:20px">Product retail Price</label>
                                            <input class="form-control" type="text" name="product_retail_price" required>
                                        </div>
                                <div class="form-group">
                                            <label style="font-size:20px">Product Wholesale Price</label>
                                            <input class="form-control" type="text" name="product_wholesale_price" required>
                                        </div>
								<div class="form-group">
                                            <label style="font-size:20px">Our Price</label>
                                            <input class="form-control" type="text" name="our_price">
                                        </div>
								<div class="form-group">
                                            <label style="font-size:20px">Stock</label>
                                            <input class="form-control" type="text" name="stock">
                                        </div>

                                        <input type="submit" class="btn btn-success" name="submit" value="Submit" />

                                    </form>
                <!-- /. ROW  -->

               
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

<?php include('include/footer.php');  ?>

</body>
</html>
