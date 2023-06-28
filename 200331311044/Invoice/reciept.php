<?php

$invoices = array('IN001', 'IN002', 'IN003', 'IN004');
$cheques = array('178456', '197456', '124545', '657866');

function generateCustomerReceipt($invoices)
{
    echo '<h2>Customer Receipt</h2>';
    echo '<form action="process_receipt.php" method="POST">';
    echo 'Select Invoices to Settle: <br>';
    
    foreach ($invoices as $invoice) {
        echo '<input type="checkbox" name="invoices[]" value="' . $invoice . '">' . $invoice . '<br>';
    }
    
    echo '<input type="submit" value="Generate Receipt">';
    echo '</form>';
}


generateCustomerReceipt($invoices);


?>
