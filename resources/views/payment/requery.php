<?php
if(isset($merchant))
{
    foreach($merchant as $key){
        
    }
}

if(isset($purchase))
{
    foreach($purchase as $key2){
        
    }
}

$total = (isset($_POST['total']))? $_POST['total']: "0.00";
$total2 = floatval($total);
$total3 = number_format($total2, 2);

require_once 'IPay88.class.php';
$ipay88 = new IPay88($key->merchantCode, $key->merchantKey);
echo $ipay88->requery(array(
    'RefNo'        => $key2,
    'Amount'       => $total3,
));