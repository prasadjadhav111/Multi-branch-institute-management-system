<!DOCTYPE html>
<html>
<head>
</head>
<body>
 <div>
  <h2>Payment Success</h2>
 </div>

  <div>
  <?php 
   if(isset($_POST['status'])){
    if($_POST['status']=="success"){
     echo "<p><h3>Payment Done Successfully.Print This Details and Send To admin@yourdomain.com <br>Payment Details Are Below.</h3></p>";
     echo "<p><h3>Txn Id: ".$_POST['txnid']."</h3></p>";
     echo "<p><h3>Name: ".$_POST['firstname']."</h3></p>";
     echo "<p><h3>Email: ".$_POST['email']."</h3></p>";
     echo "<p><h3>Amount: ".$_POST['amount']."</h3></p>";
     echo "<p><h3>Phone No: ".$_POST['phone']."</h3></p>";

      echo "<p><h3>student : ".$_POST['udf1']."</h3></p>";
     echo "<p><h3>branch : ".$_POST['udf2']."</h3></p>";
     echo "<p><h3>course: ".$_POST['udf3']."</h3></p>";

     echo "<p><h3>Product Info: ".$_POST['productinfo']."</h3></p>";
     echo "<p><h3>encryptedPaymentId: ".$_POST['encryptedPaymentId']."</h3></p>";
    }
   }

    ?><br><h2><font color="red">
   Thanks For Payment. After Payment Confirmation Your Service Activated.<br> If Your Service Not Activated in 12 Hours. Call : Your Phone No</font></h2>
 </div>
</body>

</html>