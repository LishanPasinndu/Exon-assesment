<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $servername = "localhost";
    $username = "root";
    $password = "Lishan#12345";
    $dbname = "invoice";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $selectedInvoices = $_POST['invoices'];
    $receiptID = uniqid('RCPT');

    $sql = "INSERT INTO customer_receipts (receipt_id, invoices) VALUES ('$receiptID', '" . implode(',', $selectedInvoices) . "')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Customer Receipt Generated</h2>";
        echo "Receipt ID: " . $receiptID . "<br>";
        echo "Selected Invoices: " . implode(', ', $selectedInvoices);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
} else {
    echo "Invalid request!";
}

?>
