<?php session_start(); $title='Make a Sale';  include('include/header.php');  ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="font-size:30px">Sale Entry</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<script type="text/javascript">      
				function Call(id){  
				$('#spinner').html('<i class="fa fa-spinner fa-spin" style="font-size:60px"></i>').show();               
					$.ajax({    //create an ajax request to display.php
						type: "GET",
						url: "ajax/fetch_product_detail.php?id="+id,             
						dataType: "html",   //expect html to be returned    		
						success: function(responses){                    
							$('#spinner').html('<i class="fa fa-spinner fa-spin" style="font-size:60px"></i>').hide();
							$('#result').html(responses).show();
						}                
				});
							myFunction(id);
				}
				 </script>
				<?php
				if(isset($_REQUEST['submit']))
				{	
					include('include/dbconfig.php');
					$id=$_REQUEST['id'];
					$product_id_by_name=$_REQUEST['product_id_by_name'];
					$sale_type=$_REQUEST['sale_type'];
					$quantity=$_REQUEST['quantity'];
					$amount_paid=$_REQUEST['amount_paid'];
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
						
						if(mysqli_query($conn,"INSERT INTO sale(product_id,product_per_piece_price,sale_type,quantity,total,profit_per_piece,profit_over_this_transaction,date,time) 
						VALUES('$id','$product_per_piece_price','$sale_type','$quantity','$amount_paid','$profit_per_piece','$profit_over_this_transaction','$date','$time')"))
						{
						echo '<script>alert("Sucessfully Added");</script>';
						}
						else
						{
						echo '<script>alert("Unable to add Right Now");</script>';
						}
					
					}
					
					
				}
				?>
				
				<script>
					function calculate() {
											
											var id = document.getElementById("id").value;
											var quantity = document.getElementById("quantity").value;
											var sale_type = $('input[name=sale_type]:checked').val();
											if(quantity=='')
											{
												$("#total_amount").val("");
												return;
												
											}
						
											$.ajax({    //create an ajax request to display.php
											type: "GET",
											url: "ajax/calculate_product_revenue.php?id="+id+"&sale_type="+sale_type+"&quantity="+quantity,             
											dataType: "html",   //expect html to be returned    		
											success: function(data){                    
											$("#total_amount").val(data);
											}                
											});
						
											
										
										}
									
								function myFunction(b) {
									document.getElementById("product_id_by_name").selectedIndex = b;
								}
								
								function enter_id(value_of_select) {
									$("#id").val(value_of_select);
								}
				</script>
				
				
				<script>
					function calculate_sale_status(paid_amount) {
											
											var id = document.getElementById("id").value;
											var quantity = document.getElementById("quantity").value;
											var quantity = document.getElementById("quantity").value;
											if(quantity=='')
											{
												$("#total_amount").val("");
												return;
												
											}
						
											$.ajax({    //create an ajax request to display.php
											type: "GET",
											url: "ajax/calculate_sale_status.php?id="+id+"&paid_amount="+paid_amount+"&quantity="+quantity,             
											dataType: "html",   //expect html to be returned    		
											success: function(obtained_value){
													$('#response_of_sale').html(obtained_value).show();		
													$('#submit').removeAttr('disabled');													
											}                
											});
										
										}
				</script>
				

				
                <form  method="post" id="sale_entry" name="sale_entry">
				<div class="row">		
				<div class="col-lg-7 col-md-7 col-sm-7 ">
				<?php require('include/dbconfig.php'); $data=mysqli_fetch_row(mysqli_query($conn,"SELECT id FROM customers ORDER BY id DESC LIMIT 1")); $abc=$data[0]+1;?>
				<input type="" name="customer_id" value="<?php echo $abc; ?>" hidden/>
				<input type="" name="random_no" value="<?php echo rand(1, 1000000); ?>" hidden/>
				<div class="form-group">
                                            <label style="font-size:20px">Customer Name :</label>
                                            <input class="form-control" type="text" name="customer_name" />
                </div>
				
				
				<div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 ">
										<div class="form-group">
                                            <label style="font-size:20px">Enter Product Id :</label>
			<input class="form-control" name="id" type="number" id="id" name="id" onchange="Call(this.value);" onkeyup="this.onchange()" onpaste="this.onchange()" oninput="this.onchange()" >
                                        </div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 " align="center">
										<p id="spinner"></p>
										<label style="font-size:30px" >Or</label>
										</div>
										
										<div class="col-lg-5 col-md-5 col-sm-5 ">
										
										<div class="form-group">
                                            <label style="font-size:20px">Select Product Name :</label>
                                  <select class="form-control" name="product_id_by_name" id="product_id_by_name" onchange="enter_id(this.value);Call(this.value);">
											 <option>Select</option>
											 <?php
											include('include/dbconfig.php');
											 $a=mysqli_query($conn,"SELECT * FROM products ORDER BY id ASC");
											 while($row=mysqli_fetch_object($a))
											 {
												 $product_name=$row->product_name;
												 $id=$row->id;
												 echo '<option value="'.$id.'">'.$product_name.'</option>';
											 }
											 ?>
                                            </select>
                                </div>
										
										</div>
										
				</div>   
								
                               <p id="result"></p>


								<div class="form-group" >
                                            <label style="font-size:20px">Type Of Sale :</label>
                                            <div class="radio">
                                                <label>
                                         <input type="radio" name="sale_type" id="optionsRadios1" value="per_piece" onchange="calculate();">Per piece
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                         <input type="radio" name="sale_type" id="optionsRadios2" value="wholesale" onchange="calculate();">Wholesale
                                                </label>
                                            </div>
								</div>
										<div class="form-group">
                                            <label style="font-size:20px">Quantity :</label>
			<input class="form-control" type="number" id="quantity" name="quantity" onchange="calculate();" onkeyup="this.onchange()" onpaste="this.onchange()" oninput="this.onchange()" />
                                        </div>
								
										<div class="form-group">
                                            <label style="font-size:20px">Paid By Customer :</label>
                                            <input class="form-control" id="paid" type="number" name="amount_paid" onchange="calculate_sale_status(this.value);" onkeyup="this.onchange()" onpaste="this.onchange()" oninput="this.onchange()" required/>
                                        </div>
										<p id="response_of_sale" style="color:red"></p>
										<div class="form-group">
                                            <label style="font-size:20px">Software Calculated Amount :</label>
                                            <input class="form-control" type="text" name="total_amount" id="total_amount" readonly />
                                        </div>
                                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit" disabled/>
											<p id="loader_image"></p>
                                    </form>
									
									 </div>		

<script type = "text/javascript">
           $(document).ready(function()
           {
	           $('#submit').click(function(event)
	           {
	           event.preventDefault();
		           $.ajax
		           (
			           {
				           url : "ajax/insert_sale.php",
				           method : "post",
				           data : $('#sale_entry').serialize(), 
				           dataType : "text",
				           beforeSend: function() {
					   $('#loader_image').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>').show();
					    },
				           success: function(data){
				           $('#loader_image').hide();
						$('#items_lists').html(data).show();
							$("#id").val("");								
							$("#product_id_by_name").val("");																						
							$("#quantity").val("");								
							$("#paid").val("");								
							$("#total_amount").val("");	
							$('#submit').attr("disabled", true);
					   }
			           }
		           )
	           }
           )
           }
           )
</script>







									 
									 <div class="col-lg-5 col-md-5 col-sm-5 ">
									 <h1>Billing :</h1>
									 <hr style="height:1px;border:none;color:#333;background-color:#333;" />
									 
									 <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr bgcolor="yellow">
                                            <th>S.no</th>
											<th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
								<tbody id="items_lists">
								
								</tbody>
								</table>
								</div>
									 
									 </div>
                <!-- /. ROW  -->
               </div>
			   <br>
			   <a href=""><div class="col-lg-12 col-md-12 col-sm-12" style="background-color:orange" align="center">
			   <h1>Complete Transaction</h1>
			   </div></a>
			   
			   
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
<?php include('include/footer.php');  ?>


</body>
</html>
