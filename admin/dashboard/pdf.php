<?php
require_once '../../dompdf/autoload.inc.php'; //we've assumed that the dompdf directory is in the same directory as your PHP file. If not, adjust your autoload.inc.php i.e. first line of code accordingly.
include("db.php");
// reference the Dompdf namespace
use Dompdf\Dompdf;

// Get form data from test.php
$id = $_GET['order_id'];
$query = "SELECT * FROM tbl_orders WHERE order_id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Fetch product details from the database
$productQuery = "SELECT * FROM tbl_orders WHERE order_id='$id'";
$productResult = mysqli_query($conn, $productQuery);

// Initialize a variable to store the HTML for product rows
$productRowsHTML = '';
// Initialize counter
$serialNumber = 1;
// Initialize variables for calculation
$netPrice = 0;
$totalItems = 0;
$totalQuantity = 0;
$totalMrp = 0;
$totalQuantityMrp = 0;
// Loop through the product data and create HTML rows
while ($productData = mysqli_fetch_assoc($productResult)) {
    $productRowsHTML .= "
        <tr class='rbd'>            
            <td>{$serialNumber}</td>
            <td>{$productData['p_name']}</td>
            <td>{$productData['p_mrp']}</td>
            <td>{$productData['p_discount']}</td>
            <td>{$productData['p_quantity']}</td>                       
            <td>{$productData['p_price']}</td>                        
            <td>{$productData['p_total']}</td>            
            <td>{$productData['p_mrp_total']}</td>                        
        </tr>";
    // Update the variables for calculation
    $netPrice += $productData['p_total'];
    $totalItems++;
    $totalQuantity += $productData['p_quantity'];
    $totalMrp += $productData['p_mrp'];
    $totalQuantityMrp += $productData['p_mrp_total'];
    // Increment counter
    $serialNumber++;
}
$serialNumber--;
$discountPrice = $totalQuantityMrp - $netPrice;
$overallTotal = $netPrice + $data['packing_charge'];

// Create HTML content for PDF
$htmlContent = "
<html>
<head>
    <title>" . htmlspecialchars("{$site_name} - Estimate Report") . "</title>
    <style>    
    td{
        padding: 5px;
    }
    .bd{
        border: 2px solid black;
    }
    .pd-10{
        padding: 10px;
    }
    .rbd td{
        border: 2px solid black;
        text-align: center;
    }
    .fs-20{
        font-size: 20px;
    }
    .none h4,
    .none p{
        margin:5px;
    }
    .rline{
        border-right: 2px solid black;
    }
    .bline{
        border-bottom: 2px solid black;
    }
    .tline{
        border-top: 2px solid black;
    }
    .right{
        text-align:right;
    }
    .none h4{
        text-decoration: underline;
    }
    </style>
</head>
<body>            
    <main class='main'>
        <table class='bd' style='width:100%' cellspacing='0'>
            <tr class='bd'>
                <td colspan='3' class='bline'>Estimate No : <b>{$data['order_id']}</b></td>
                <td colspan='3' class='bline'><b>ESTIMATE REPORT</b></td>
                <td colspan='2' class='bline right'>Date : <b></b>{$data['date']}</td>
            </tr>
            <tr class='bd'>
                <td colspan='4' class='bline'>Phone : <b>$site_mobile_number,$site_whatsapp_number</b></td>
                <td colspan='4' class='bline right'>Email : <b>$site_email</b></td>
            </tr>
            <tr>
                <td class='bline'></td>
                <td colspan='6' class='bline'><center>
                    <h2><b>$site_name</b></h2>
                    <p>$site_address</p>
                </center></td>
                <td class='bline'></td>
            </tr>  
            <tr class='bline'>
                <td colspan='4' class='none rline'>
                    <h4><center><b>Customer Details</b></center></h4>
                    <p>Name : <b>$data[name]</b></p>
                    <p>Mobile: <b>$data[phone]</b></p>
                    <p>E-Mail Id : <b>$data[email]</b></p>
                    <p>Address : <b>$data[address]</b></p>
                    <p>Order Status : <b>$data[order_status]</b></p>
                </td>
                <td colspan='4' class='none'>
                    <h4><center><b>Bank Details</b></center></h4>
                    <p>Acc Name : <b>$account_holder_name_one</b></p>
                    <p>Acc Number : <b>$account_number_one</b></p>
                    <p>IFSC Code : <b>$ifsc_code_one</b></p>
                    <p>Bank Name : <b>$bank_name_one</b></p>
                    <p>Branch : <b>$branch_one</b></p>
                </td>            
            </tr>
            <tr class='rbd'>
                <td><b>S.No</b></td>
                <td style='min-width:150px'><b>Product Name</b></td>
                <td><b>MRP (Rs)</b></td>
                <td><b>Discount (%)</b></td>
                <td><b>Quantity</b></td>
                <td><b>Price (Rs)</b></td>
                <td><b>Amount</b></td>                                
                <td><b>Total Mrp</b></td>                                
            </tr>
            {$productRowsHTML}
            <tr class='right'>
                <td colspan='2'></td>
                <td colspan='3'></td>
                <td colspan='3'>                    
                    <p>Net Price: {$totalQuantityMrp}</p>
                    <p>Discount Price: {$discountPrice}</p>
                    <p>Sub Total: {$netPrice}</p>
                    <p>Packing Charges: $data[packing_charge]</p>
                    <p>Promotion Discount: $data[promotion_discount]</p>
                </td>
            </tr>
            <tr class='rbd'>
                <td colspan='2'>Total Items:{$serialNumber}</td>
                <td colspan='3'>Total Quanity:{$totalQuantity}</td>
                <td colspan='3'>Over all Total:{$overallTotal}</td>
            </tr>
        </table>
    </main>
</body>
</html>
";


// instantiate and use the dompdf class
$dompdf = new Dompdf();
// $dompdf->set_option('enable_html5_parser', TRUE);
// Load HTML content
$dompdf->loadHtml($htmlContent);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("{$data['order_id']}-{$data['name']}.pdf", ["Attachment" => false]);
?>