 <!DOCTYPE html>
<html>
<head>

<title>Payment Processing</title>
 <script>
    function submitForm() {
      var postForm = document.forms.postForm;
      postForm.submit();
    }
</script>
</head>
<body onload="submitForm();">




  <form name="postForm" action="https://test.payu.in/_payment" method="POST" >
    
  <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
  <input type="hidden" name="hash" value="<?php echo $hash;  ?>"/>
  <input type="hidden" name="txnid" value="<?php echo $txnid;  ?>" />
  <input type="hidden" name="amount" value="<?php echo $amount;  ?>" />
  <input type="hidden" name="firstname" value="<?php echo $firstname;  ?>" />
  <input type="hidden" name="email" value="<?php echo $email;  ?>" />
  <input type="hidden" name="phone" value="<?php echo $phone;  ?>" />
  <input type="hidden" name="productinfo" value="<?php echo $productinfo;  ?>" />
  <input type="hidden" name="udf1" value="<?php echo $udf1;  ?>" size="64" />
  <input type="hidden" name="udf2" value="<?php echo $udf2;  ?>" size="64" />
  <input type="hidden" name="udf3" value="<?php echo $udf3;  ?>" size="64" />
  <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
  
  <input type="hidden" name="surl" value="<?php echo $surl;  ?>" />
  <input type="hidden" name="furl" value="<?php echo $furl;  ?>" />
 </form>
</div>
</body>

</html>
