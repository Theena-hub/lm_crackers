<?php
    require('dompdf/autoload.inc.php');
    include('admin/dashboard/db.php');

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $c_address2 = 
        $c_name = str_replace('_', ' ', $_POST['name']);
        $c_email = $_POST['email'];
        $c_mobile = $_POST['mobile'];
        $c_address = str_replace('_', ' ', $_POST['address']);
        $state = str_replace('_', ' ', $_POST['state']);
        $content = str_replace('_', ' ', $_POST['content']);
        $total = $_POST['total'];
        $nettotal = $_POST['nettotal'];
        $pcharge = $_POST['pcharge'];
        $promocode = $_POST['promodis'];
        $oid = $_POST['oid'];
        $dateonly = date("d-m-Y");
        $product = explode(',',$content);
        $product_size = count($product);
        $disamt = $nettotal - $total;
        $finialtotal = $total + $pcharge - $promocode;

        // Create HTML content for the PDF
        $html = '
                <!DOCTYPE html>
                <html>
                    <head>
                        <title>Estimate Report</title>
                        <style>
                            body {
                                font-family: "Arial", sans-serif;
                            }
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
                        <main class="main">
                            <table class="bd" style="width:100%" cellspacing="0">
                                <tr class="bd">
                                    <td colspan="3" class="bline">Estimate No : <b>'.$oid.'</b></td>
                                    <td colspan="3" class="bline"><b>ESTIMATE REPORT</b></td>
                                    <td colspan="2" class="bline right">Date : <b>'.$dateonly.'</b></td>
                                </tr>
                                <tr class="bd">
                                    <td colspan="4" class="bline">Phone : <b>'.$site_mobile_number.' , '.$site_whatsapp_number.' </b></td>
                                    <td colspan="4" class="bline right">Email : <b>'.$site_email.'</b></td>
                                </tr>
                                <tr>
                                    <td class="bline"></td>
                                    <td colspan="6" class="bline"><center>
                                        <h2><b>'.$site_name.'</b></h2>
                                        <p>'.$site_address.'</p>
                                    </center></td>
                                    <td class="bline"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="none rline">
                                        <h4><center><b>Customer Details</b></center></h4>
                                        <p>Name : <b>'.$c_name.'</b></p>
                                        <p>Mobile: <b>'.$c_mobile.'</b></p>
                                        <p>E-Mail Id : <b>'.$c_email.'</b></p>
                                        <p>Address : <b>'.$c_address.'</b></p>
                                        <p>State : <b>'.$state.'.</b></p>
                                    </td>
                                    <td colspan="4" class="none">
                                        <h4><center><b>Bank Details</b></center></h4>
                                        <p>Acc Name : <b>MUTHULAKSHMI</b></p>
                                        <p>Acc Number : <b>10914621030</b></p>
                                        <p>IFSC Code : <b>SBIN0000961</b></p>
                                        <p>Bank Name : <b>STATE BANK OF INDIA</b></p>
                                        <p>Branch : <b>SATTUR BRANCH</b></p>
                                    </td>
                                </tr>
                                <tr class="rbd">
                                    <td><b>S.No</b></td>
                                    <td><b>Code</b></td>
                                    <td style="min-width:150px"><b>Product Name</b></td>
                                    <td><b>MRP (Rs)</b></td>
                                    <td><b>Discount (%)</b></td>
                                    <td><b>Quantity</b></td>
                                    <td><b>Price (Rs)</b></td>
                                    <td><b>Amount (Rs)</b></td>
                                </tr>';

                                $k = 1;
                                $totalqty = 0;
                                $i = 0;
                                while($i<($product_size-1)){
                                    $pcode = $product[$i];
                                    $name = $product[$i+1];
                                    $quantity = $product[$i+2];
                                    $price = $product[$i+3];
                                    $subtotal = $product[$i+4];
                                    $mrp = $product[$i+5];            
                                    $mrptotal = $product[$i+6];
                                    $discount = $product[$i+7];         
                                    $totalqty += $quantity;

                                    $html .= '<tr class="rbd">
                                                <td>'.$k.'</td>
                                                <td>'.$pcode.'</td>
                                                <td>'.$name.'</td>
                                                <td>'.number_format($mrp,2).'</td>
                                                <td>'.$discount.'</td>
                                                <td>'.$quantity.'</td>
                                                <td>'.number_format($price,2).'</td>
                                                <td>'.number_format($subtotal,2).'</td>
                                            </tr>';

                                    $k++;
                                    $i=$i+8;
                                }
                        $html .= '
                                <tr class="right">
                                    <td colspan="7">Net Total (Rs) : </td>
                                    <td><b>'.number_format($nettotal,2).'</b></td>
                                </tr>
                                <tr class="right">
                                    <td colspan="7">Discount Price (Rs) : </td>
                                    <td><b>'.number_format($disamt,2).'</b></td>
                                </tr>
                                <tr class="right">
                                    <td colspan="7">Sub Total (Rs) : </td>
                                    <td><b>'.number_format($total,2).'</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="tline">Total items : <b>'.($k-1).'</b></td>
                                    <td colspan="2" style="text-align:center;" class="tline">Total Quantity : <b>'.number_format($totalqty).'</b></td>
                                    <td colspan="3" class="tline right"><b>Overall Total (Rs) : </b></td>
                                    <td colspan="1" class="tline right"><b>'.number_format($finialtotal,2).'</b></td>
                                </tr>
                            </table>
                        </main>
                    </body>
                </html>';

        // Initialize dompdf
        $dompdf->set_option('enable_html5_parser', TRUE);	    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();
        $dompdf->stream("'.$site_name.'_'$dateonly'.pdf", ["Attachment" => false]);	            
    }
?>