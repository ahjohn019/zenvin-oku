<?php
$name = (isset($_POST['name']))? $_POST['name']: "null";
$email = (isset($_POST['email']))? $_POST['email']: "null";
$phone = (isset($_POST['phone']))? $_POST['phone']: "null";
$productName = (isset($_POST['productName']))? $_POST['productName']: "null";
$productPrice = (isset($_POST['productPrice']))? $_POST['productPrice']: "0.00";
$quantity = (isset($_POST['quantity']))? $_POST['quantity']: "0";
$total = (isset($_POST['total']))? $_POST['total']: "0.00";

$total2 = floatval($total);
$total3 = number_format($total2, 2);

if(isset($merchant))
{
    foreach($merchant as $key){
        
    }
}

if(isset($payment))
{
    foreach($payment as $key2){
        
    }
}

/*echo("Print merchant code")."<br>";
foreach ($merchant as $key){
    echo $key->merchantCode."<br>";
}

"<br>";
echo("Print paymentID")."<br>";
foreach ($payment as $key2){
      echo $key2->paymentID."<br>";
}

"<br>";
echo("Print refNo")."<br>";
echo $purchase."<br>";*/
    
require_once '/IPay88.class.php'; 
$ipay88 = new IPay88($key->merchantCode, $key->merchantKey);
$ipay88->setTransactionType(IPay88::TRANSACTION_TYPE_PAYMENT);
//$ipay88->setTransactionType(IPay88::TRANSACTION_TYPE_RECURRING_SUBSCRIPTION);
//$ipay88->setTransactionType(IPay88::TRANSACTION_TYPE_RECURRING_TERMINATION);
$ipay88->setField('RefNo', $purchase);

if ($ipay88->getTransactionType() == IPay88::TRANSACTION_TYPE_PAYMENT) {
    // For standard online payment.
    $ipay88->setField('PaymentId',$key2->paymentID);
    $ipay88->setField('Amount', $total3);
    $ipay88->setField('Currency', 'MYR');
    $ipay88->setField('ProdDesc', $productName);
    $ipay88->setField('UserName', $name);
    $ipay88->setField('UserEmail',  $email);
    $ipay88->setField('UserContact',  $phone);
    $ipay88->setField('Remark', '');
    $ipay88->setField('Lang', 'utf-8');
    //$ipay88->setField('SignatureType', 'SHA-256');
    $ipay88->setField('ResponseURL', 'http://oku.azurewebsites.net/response.php');
    //$ipay88->setField('BackendURL', 'http://oku.azurewebsites.net/response.php');

}

else if ($ipay88->getTransactionType() == IPay88::TRANSACTION_TYPE_RECURRING_SUBSCRIPTION) {
    // For recurring subscription payment.
    $ipay88->setField('FirstPaymentDate', '22042012');
    $ipay88->setField('Currency', 'MYR');
    $ipay88->setField('Amount', '1.00');
    $ipay88->setField('NumberOfPayments', 1);
    $ipay88->setField('Frequency', 1);
    $ipay88->setField('Desc', 'Testing recurring payment');
    $ipay88->setField('CC_Name', 'John Doe');
    $ipay88->setField('CC_PAN', '1111111111111111');
    $ipay88->setField('CC_CVC', '111');
    $ipay88->setField('CC_ExpiryDate', '122020');
    $ipay88->setField('CC_Country', 'Malaysia');
    $ipay88->setField('CC_Bank', 'Maybank');
    $ipay88->setField('CC_Ic', '888888888888');
    $ipay88->setField('CC_Email', 'your@email.com');
    $ipay88->setField('CC_Phone', '0123456789');
    $ipay88->setField('CC_Remark', 'Bla bla..');
    $ipay88->setField('P_Name', 'John Doe');
    $ipay88->setField('P_Email', 'your@email.com');
    $ipay88->setField('P_Phone', '0123456789');
    $ipay88->setField('P_Addrl1', 'Lorem');
    $ipay88->setField('P_Addrl2', 'Ipsum');
    $ipay88->setField('P_City', 'Dolor');
    $ipay88->setField('P_State', 'Kuala Lumpur');
    $ipay88->setField('P_Zip', '50000');
    $ipay88->setField('P_Country', 'Malaysia');
    $ipay88->setField('ResponseURL', 'http://oku.azurewebsites.net/recurring_response.php');
}
else if ($ipay88->getTransactionType() == IPay88::TRANSACTION_TYPE_RECURRING_TERMINATION) {
    // For recurring termination request.
    // Only requires RefNo, MerchantCode, and Signature which is already set.
}
$ipay88->generateSignature();
$ipay88Fields = $ipay88->getFields();
$signature = $ipay88->generateSignature();
?>

<!doctype html>
<html>
<head>
    <title>IPay88 - Test - Request</title>
</head>
<body>
    <h1>IPay88 payment gateway</h1>
    <p>Transaction type: <?php echo $ipay88->getTransactionType(); ?></p>
    
    <?php if (!empty($ipay88Fields)): ?>
    <!--Enquiry and entry cause differnt result-->

    <!--<form action="<//?php echo $ipay88->getTransactionUrl(); ?>" method="post">-->
    <!--<form action="https://www.ipay88.com" method="post">-->
    <div>
    <form action="{{url('fakepaymentresponse')}}" method="post">
            <table>
                
                       <!-- <td><label>MerchantCode</label></td>
                        <td><input type="text" name="MerchantCode" value="<?php echo $key->merchantCode; ?>" /></td>
                         <td><label>PaymentId</label></td>
                        <td><input type="text" name="PaymentId" value="<?php echo $key2->paymentID; ?>" /></td>
                         <td><label>RefNo</label></td>
                        <td><input type="text" name="RefNo" value="<?php echo $purchase; ?>" /></td>
                         <td><label>Amount</label></td>
                        <td><input type="text" name="Amount" value="<?php echo $productPrice; ?>" /></td>
                         <td><label>Currency</label></td>
                        <td><input type="text" name="Currency" value="MYR" /></td>
                        <td><label>ProdDesc</label></td>
                        <td><input type="text" name="ProdDesc" value="<?php echo $productName; ?>" /></td>
                        <td><label>UserName</label></td>
                        <td><input type="text" name="UserName" value="<?php echo $name; ?>" /></td>
                        <td><label>UserEmail</label></td>
                        <td><input type="text" name="UserEmail" value="<?php echo $email; ?>" /></td>
                        <td><label>UserContact</label></td>
                        <td><input type="text" name="UserContact" value="<?php echo $phone; ?>" /></td>
                        <td><label>Remark</label></td>
                        <td><input type="text" name="Remark" value="" /></td>
                        <td><label>Lang</label></td>
                        <td><input type="text" name="Lang" value="utf-8" /></td>
                        <td><label>Signature</label></td>
                        <td><input type="text" name="Signature" value="<?php echo $signature; ?>" /></td>
                        <td><label>ResponseURL</label></td>
                        <td><input type="text" name="ResponseURL" value="http://oku.azurewebsites.net/response.php" /></td>-->
                <?php 
                $number =0;
                foreach ($ipay88Fields as $key => $val): ?>
                    <!--<tr>
                        <td><label><?php echo $key; ?></label></td>
                        <td><input type="text" name="<?php echo $key; ?>" value="<?php echo $val; ?>" /></td>
                    </tr>-->
                    <tr>
                        <td><label><?php echo $key; ?></label></td>
                        <td><input type="text" name="<?php echo $key; ?>" value="<?php echo $val; ?>" />
                        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>" />
                        </td>
                    </tr>
   
                <?php endforeach; ?> 
                <tr>
                <h4 style="color:red;">Please confirm your payment details before redirect to Ipay88 Payment Gateway.</h4>
                <td colspan="2">
                   <input id="paywithIpay88" type="submit" value="Submit" name="PaywithIPay88">
                </td>  
                    
                </tr>
            </table>
        <!--<li><a href="https://www.mobile88.com/epayment/enquiry.asp">Response</a></li>
        <li><a href="https://www.mobile88.com/epayment/enquiry.asp">Requery</a></li>-->
        </form>
    </div>
    <?php endif; ?>

</body>
    
<!-- autoclick the button to proceed to Ipay88 payment gateway
<script>
document.getElementById('paywithIpay88').click()
</script>-->
</html>