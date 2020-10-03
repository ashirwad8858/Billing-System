<?php $title='View Customer'; include('include/header.php');  ?>
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
                                            <th>Customer Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
								<tbody>
								
								
								
								<?php
									include("include/dbconfig.php");
									$data=mysqli_query($conn,"SELECT * FROM customers ORDER BY id DESC");
									while($row=mysqli_fetch_object($data))
									{
										$id=$row->id;
										$customer_name=$row->customer_name;
										echo '<tr>
										<td>'.$id.'</td>
										<td>'.$customer_name.'</td>
										<td><a href="invoice.php?id='.$id.'&name='.$customer_name.'" target="_blank">Create Invoice</a></td>';
										
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
