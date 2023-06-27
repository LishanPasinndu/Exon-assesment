<!DOCTYPE html>
<html>
<head>
    <title>Invoice Adding System</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php

     $items = [];

    function calculateTotal($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }

    function displayInvoice($items)
    {
        echo '<table>';
        echo '<tr>';
        echo '<th>Invoice No</th>';
        echo '<th>Cheque No</th>';
        echo '<th>Item</th>';
        echo '<th>Quantity</th>';
        echo '<th>Price</th>';
        echo '<th>Total</th>';
        echo '</tr>';

        foreach ($items as $item) {
            $total = $item['quantity'] * $item['price'];
            echo '<tr>';
            echo '<td>' . $item['inum'] . '</td>';
            echo '<td>' . $item['chek'] . '</td>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['quantity'] . '</td>';
            echo '<td>' . $item['price'] . '</td>';
            echo '<td>' . $total . '</td>';
            echo '</tr>';
        }

        echo '<tr>';
        echo '<td colspan="3" style="text-align: right;"><strong>Total:</strong></td>';
        echo '<td>' . calculateTotal($items) . '</td>';
        echo '</tr>';

        echo '</table>';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
        $name = $_POST['name'];
        $inum = $_POST['inum'];
        $chek = $_POST['chek'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

       
        $item = [
            'name' => $name,
            'inum' => $inum,
            'chek' => $chek,
            'quantity' => $quantity,
            'price' => $price
        ];

       
        $items[] = $item;
    }
    ?>

    <h1>Invoice Adding System</h1>

    <form method="post">

        <label for="name">Item Name:</label>
        <input type="text" name="name" id="name" required>
        <br/><br/>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>
        <br/><br/>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" required>
        <br/><br/>

        <label for="quantity">Invoice No:</label>
        <input type="text" name="inum" id="inum" required>
        <br/><br/>

        <label for="quantity">Cheque No:</label>
        <select name="chek" id="check">
            <option value="178456">178456</option>
            <option value="197456">197456</option>
            <option value="124545">124545</option>
            <option value="657866">657866</option>
        </select>
        <br/><br/>

        <input type="submit" value="Add Item">
    </form>

    <h2>Invoice</h2>
    <?php
    if (!empty($items)) {
        displayInvoice($items);
    } else {
        echo 'No items added yet.';
    }
    ?>
    
</body>
</html>
