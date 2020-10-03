<?php $title='Update Products'; include('include/header.php');  ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Update Products</h1>
                    </div>
                </div>
               <?php
				if(isset($_REQUEST['submit'])) {
					
					$product_name=$_REQUEST['product_name'];
					$product_retail_price=$_REQUEST['product_retail_price'];
					$product_wholesale_price=$_REQUEST['product_wholesale_price'];
					$our_price=$_REQUEST['our_price'];
					$id=$_REQUEST['id'];
					
					
					include('include/dbconfig.php');
					if(mysqli_query($conn,"UPDATE  products SET product_name='$product_name',retail_price='$product_retail_price',wholesale_price='$product_wholesale_price',our_price='$our_price' WHERE id='$id'"))
					{
						echo '<script>alert("Sucessfully Updated");</script>';
					}
					else
					{
						echo '<script>alert("Unable to Update Right Now");</script>';
					}
				}
				?>
								
								<?php
									include("include/dbconfig.php");
									$id=$_REQUEST['id'];
									$data=mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");
									while($row=mysqli_fetch_object($data))
									{
										$id=$row->id;
										$product_name=$row->product_name;
										$retail_price=$row->retail_price;
										$wholesale_price=$row->wholesale_price;
										$our_price=$row->our_price;
									}
									?>
							<form  method="post">
                                        <input  type="text" name="id" value="<?php echo $id; ?>" hidden >
                                 <div class="form-group">
                                            <label style="font-size:20px">Product Name</label>
                                            <input class="form-control" type="text" name="product_name" value="<?php echo $product_name; ?>" required />
                                        </div>
                                 <div class="form-group">
                                            <label style="font-size:20px">Product retail Price</label>
                                            <input class="form-control" type="text" name="product_retail_price" value="<?php echo $retail_price; ?>" required />
                                        </div>
                                <div class="form-group">
                                            <label style="font-size:20px">Product Wholesale Price</label>
                                            <input class="form-control" type="text" name="product_wholesale_price" value="<?php echo $wholesale_price; ?>" required />
                                        </div>
								<div class="form-group">
                                            <label style="font-size:20px">Our Price</label>
                                            <input class="form-control" type="text" name="our_price" value="<?php echo $our_price; ?>" required/>
                                        </div>

                                        <input type="submit" class="btn btn-success" name="submit" value="Submit"  />

                                    </form>	
				


            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

<?php include('include/footer.php');  ?>
    


</body>
</html>
