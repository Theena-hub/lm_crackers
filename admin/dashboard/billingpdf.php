<?php
    require('dompdf/autoload.inc.php');
    include("db.php");

    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    // check url parameter  is set or not
    if (isset($_GET['bid'])) {
        $bid = $_GET['bid'];
    } else {
        header("Location: billing.php");
        exit();
    }

    // fetch data
    $query = "select * from tbl_billing where bid='$bid'";
    $result = mysqli_query($conn, $query);
    if($item = mysqli_fetch_array($result)){        
        $c_name = $item['name'];
        $c_mobile = $item['mobile'];
        $c_whatsno = $item['whatsapp'];
        $c_idproof = $item['id_proof'];
        $c_bdate = $item['date'];
        $c_mop = $item['payment'];
        $c_address = $item['address'];
        $c_roAmt = $item['amount'];
        $c_prdlist = json_decode($item['product_list']);
        $dateonly = date("d-m-Y");

        // Create HTML content for the PDF
        $html = '
                <!DOCTYPE html>
                <html>
                    <head>
                        <title>Billing Report</title>
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
                                    <td colspan="3" class="bline">Billing No : <b>'.$bid.'</b></td>
                                    <td colspan="3" class="bline"><b>BILLING REPORT</b></td>
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
                                    <td colspan="8" class="none rline">
                                        <h4><center><b>Customer Details</b></center></h4>
                                        <p>Name : <b>'.$c_name.'</b></p>
                                        <p>Mobile: <b>'.$c_mobile.'</b></p>
                                        <p>Whatsapp : <b>'.$c_whatsno.'</b></p>
                                        <p>Id Proof : <b>'.$c_idproof.'</b></p>
                                        <p>Mode of Payment : <b>'.$c_mop.'</b></p>
                                        <p>Address : <b>'.$c_address.'</b></p>
                                    </td>
                                </tr>
                                <tr class="rbd">
                                    <td><b>S.No</b></td>
                                    <td><b>Code</b></td>
                                    <td style="min-width:150px"><b>Product Name</b></td>
                                    <td><b>MRP (Rs)</b></td>
                                    <td><b>Quantity</b></td>
                                    <td><b>Discount (%)</b></td>
                                    <td><b>Price (Rs)</b></td>
                                    <td><b>Total (Rs)</b></td>
                                </tr>';

                                $k = 1;
                                $totalqty = 0;
                                $total = 0;
                                foreach($c_prdlist as $key=>$prod){
                                    $totalqty += $prod->p_qty;
                                    $total += $prod->p_total;
                                    $html .= '<tr class="rbd">
                                                <td>'.$k.'</td>
                                                <td>'.$prod->p_id.'</td>
                                                <td>'.$prod->p_name.'</td>
                                                <td>'.number_format($prod->p_mrp).'</td>
                                                <td>'.number_format($prod->p_qty).'</td>
                                                <td>'.$prod->p_dis.'</td>
                                                <td>'.number_format($prod->p_disprice,2).'</td>
                                                <td>'.number_format($prod->p_total,2).'</td>
                                            </tr>';
                                    $k++;
                                }
                        $html .= '
                                <tr class="right">
                                    <td colspan="7">Total (Rs) : </td>
                                    <td><b>'.number_format($total,2).'</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="tline">Total items : <b>'.($k-1).'</b></td>
                                    <td colspan="2" style="text-align:center;" class="tline">Total Quantity : <b>'.$totalqty.'</b></td>
                                    <td colspan="3" class="tline right"><b>Final Amount (Rs) : </b></td>
                                    <td colspan="1" class="tline right"><b>'.number_format($c_roAmt).'</b></td>
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