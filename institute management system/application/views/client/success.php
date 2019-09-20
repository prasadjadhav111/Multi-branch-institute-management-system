<?php $this->load->view('client/include/header'); ?>
<?php $this->load->view('client/include/topmenu'); ?>
<?php $this->load->view('client/include/mainmenu'); ?>
<!-- 
<section class="banner inner-page">
        	<div class="banner-img"><img src="<?php echo base_url('assets/assets_client/images/banner/checkout.jpg');?>" alt=""></div>
            <div class="page-title">	
	            <div class="container">
                    <h1>Payment Recepet</h1>
                </div>
            </div>
        </section> -->
            <?php
$data1['data']='checkout.jpg';
$data1['msg']='Payment Receipt';
 $this->load->view('client/include/banner',$data1);
  ?>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All courses</a></li>
                </ul>
            </div>
        </section>


<!------ Include the above in your HEAD tag ---------->



<div class="container1" id="res">
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo base_url('assets/assets_client/images/logo.png');?>">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>academy</h5>
							<p>+91 12345-6789 <i class="fa fa-phone"></i></p>
							<p>info@academy.com <i class="fa fa-envelope-o"></i></p>
							<p>India <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h3> <?php echo $name; ?></h3><br><br>
              <p><b>Transaction : </b><?php echo $transaction_id; ?></p>
							<p><b>Mobile :</b> <?php echo $mobile; ?></p>
							<p><b>Email :</b><?php echo $email; ?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1> Payment Receipt</h1>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead style="background: black">
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><?php echo $course; ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $fee."/-";?></td>
                        </tr>
                      <tr>
                        <td class="text-right">
                            <p>
                                <strong>Charges: </strong>
                            </p>
                            
              </td>

                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php echo $charge."/-"; ?></strong>
                            </p>
                            
              </td>
                      </tr>    
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php echo $total."/-"; ?>
                              </strong>
                            </p>
                            
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-primary"><h2><strong><i class="fa fa-inr"></i> <?php echo $total."/-"; ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Branch :</b> <?php echo $branch; ?></p>
              <p><b>Date :</b> <?php echo $time; ?></p>
							
            </div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Signature</h1>
              <img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo base_url('assets/assets_client/images/logo.png');?>">
							
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>

<div align="center" class="table">
  <button type="button" class="btn btn-primary btn-md" id="button1">Print</button>
</div><br><br>
<?php $this->load->view('client/include/footer'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets_client/css/payment.css'); ?>">
<!-- <script type="text/javascript">
	
// 	$(document).ready(function()
// {
// 	 // window.print();
//         $('#button1').click(function()
//         {
//               window.print();

//         });
// });
function printPageArea(areaID){
//     var printContent = document.getElementById(areaID);
//     var WinPrint = window.open('', '', 'width=900,height=650');
//     WinPrint.document.write(printContent.innerHTML);
//     WinPrint.document.close();
//     WinPrint.focus();
//     WinPrint.print();
//     WinPrint.close();
// }


var prtContent = document.getElementById(areaID);
var WinPrint = window.open('', '', 'left=0,top=0,width=900,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write('<html><head>');
WinPrint.document.write('<link rel="stylesheet" href="<?php echo base_url('assets/assets_client/css/bootstrap.css');?>">');
WinPrint.document.write('<link rel="stylesheet" href="<?php echo base_url('assets/assets_client/css/payment.css');?>">');
// WinPrint.document.write('<link rel="stylesheet" href="assets/css/print/receipt.css">');
WinPrint.document.write('</head><body onload="print();close();">');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.write('</body></html>');
WinPrint.document.close();
WinPrint.focus();
}
</script> -->
  <script src="<?php echo base_url()."js/printThis.js";?>"></script>

<script type="text/javascript">

  $(document).ready(function(){

    
    $("#button1").click(function(){
    

    $("#res").printThis({

      debug: false,
      importCSS: true,
      printContainer: true,
      loadCSS: "<?php echo base_url('assets/assets_client/css/payment.css');?>",
      pageTitle: "",
      removeInline: false,
      printDelay: 333,
      header: null,
      footer: null,
      formValues: true,
      canvas: false,
      base: false,
      doctypeString: '<!DOCTYPE html>',
      removeScripts: false,
      copyTagClasses: false
    });
  });
});

</script>