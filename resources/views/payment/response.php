<?php

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

require_once 'IPay88.class.php';
$ipay88 = new IPay88($key->merchantCode, $key->merchantKey);
$response = $ipay88->getResponse();
?>
<!doctype html>
<html>
<head>
    <title>IPay88 - Test - Response</title>
</head>
<body>
    <h1>IPay88 payment gateway</h1>

    <?php if ($response['status']): ?>
        <p>Your transaction was successful.</p>
    <?php else: ?>
        <p>Your transaction failed.</p>
    <?php endif; ?>

    <table>
        <?php if ($response): ?>
            <?php foreach ($response['data'] as $key => $val): ?>
                <tr>
                    <td><?php print $key; ?></td>
                    <td><?php print $val; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">No response or transaction failed.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>