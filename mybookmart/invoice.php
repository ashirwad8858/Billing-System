<?php
 include('include/dbconfig.php');
 $id=$_GET['id'];  
  $name=$_GET['name'];  
 $datewa= date("Y-m-d");
$timewa= date("H:i:s");
 $title=@$name.'-'.$datewa.'-'.$timewa;
 include('include/header.php');  ?>
        <!-- /. NAV SIDE  -->
        <style>
        @media print {
    tr.vendorListHeading {
        background-color: #1a4567 !important;
        -webkit-print-color-adjust: exact; 
    }
}

@media print {
    .vendorListHeading th {
        color: white !important;
    }
}

@media print {
  a[href]:after {
    content: none !important;
  }
}
</style>
        <script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("page-inner").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = (frame1.contentWindow) ? frame1.contentWindow : (frame1.contentDocument.document) ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>MyBookmart</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>
        <div id="page-wrapper" id="div2" >
            <div id="page-inner" class="print" >
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" align="center">INVOICE </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
     
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="assets/img/logo.jpg" width="380px" height="150px" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   MyBookmart</strong>
              <br />
                  <i>Address :</i> In Front of New Gate MMMUT ENGG. COLLEGE
              <br />
                 Deoria Road, Gorakhpur ,Uttar Pradesh
              <br />
                  India.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Contact us : </strong>  http://mybookmart.com/contactus 
             </span>
             <br>
             <span>
                 <strong>Call : </strong>   +91-7860707537 ,+91-7860707566 
             </span>
              
             <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
         <h4>  <strong>Client Information :</strong></h4>
           <h3><strong> <?php echo $name; ?>	</strong></h3>
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <h4>  <strong>Payment Details :</strong></h4>

              <b> Bill Date :</b> <?php echo date('l jS \of F Y h:i:s A'); ?> 
              <br />
               <b>Payment Mode : </b> Cash on Counter
         </div>
     </div>
     <hr />
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" cellspacing="1" cellpadding="5" >
                            <thead>
                                <tr>
                                    <th align="center">S. No.</th>
                                    <th align="center">Item Name</th>
                                    <th align="center">Quantity.</th>
                                    <th align="center">Unit Price</th>
                                     <th align="center">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php
							$i=0;
                            $fetchshippingdata=mysqli_query($conn,"SELECT * FROM sale WHERE customer_id='$id'");
						while($row=mysqli_fetch_object($fetchshippingdata))
						{
						$i++;
						$product_id=$row->product_id;
						$quantity=$row->quantity;
						$cost_per_piece=$row->product_per_piece_price;
						$Total_Amount=$row->total;
						@$c=$c+$Total_Amount;
						$product_detail=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM products WHERE id='$product_id'"));
						
                            echo '<tr>
                                    <td align="center">'.$i.'</td>
                                    <td align="center">'.$product_detail[1].'</td>
                                    <td align="center">'.$quantity.'</td>
                                    <td align="center">'.$cost_per_piece.'-/ INR. &nbsp;&nbsp;</td>
                                    <td align="center">'.$Total_Amount.'-/ INR.</td>
                                </tr>';
                                }
                            ?>
                            
                            
                            
                            </tbody>
                        </table>

               </div>
             <hr />

              <div class="ttl-amts">
                  <h4> &nbsp;<strong>Bill Amount :&nbsp;<?php echo $c ?>-/ INR.</strong> </h4>
             </div>
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
                    This is an electronic generated invoice so doesn't require any signature.

                 </li>
                 <li>
                     Please read all terms and polices on  http://mybookmart.com/termsandcondition for returns, replacement and other issues.

                 </li>
             </ol>
             </div>
         </div>
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             
             &nbsp;&nbsp;&nbsp;
             </div>
         </div>
                    </div>
                </div>

            </div><button class="btn btn-primary btn-lg" onclick="PrintDiv();">Print Invoice</button>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.mybookmart.com/" target="_blank">Mybookmart.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
