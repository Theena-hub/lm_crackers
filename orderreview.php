
<?php
    include('admin/dashboard/db.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $c_name = $_POST['name'];
        $c_email = $_POST['email'];
        $c_mobile = $_POST['mobile'];
        $c_address = $_POST['address'];
        $state = $_POST['state'];
        $content = $_POST['content'];
        $oid = $_POST['oid'];
        $total = $_POST['total'];
        $nettotal = $_POST['nettotal'];
        $pcharge = $_POST['pcharge'];
        $promodiscount = $_POST['promodis'];
        $dateonly = date("d-m-Y");
        $product = explode(',',$content);
        $product_size = count($product);
        $disamt = $nettotal - $total;
        $finialtotal = $total + $pcharge - $promodiscount;
        $query = "select * from tbl_orders where order_id='$oid'limit 1";
        $result = mysqli_query($conn,$query);
        $row1 = mysqli_fetch_array($result);
    }  
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('head.php') ?>
    <body>
        <!-- navigation start -->
        <?php include('nav.php') ?>
        <!-- navigation end -->
        <h1 class="cat">Order Review</h1>
        <form action="pdf.php" method="post" target="_blank">
            <div class="download">
                <input type="hidden" id="content" name="content" value=<?php echo (str_replace(' ', '_', $_POST['content'])) ?> />
                <input type="hidden" id="state" name="state" value=<?php echo (str_replace(' ', '_', $_POST['state'])) ?> />
                <input type="hidden" id="total" name="total" value=<?php echo $total ?> />
                <input type="hidden" id="nettotal" name="nettotal" value=<?php echo $nettotal ?> />
                <input type="hidden" id="pcharge" name="pcharge" value=<?php echo $pcharge ?> />
                <input type="hidden" id="promodis" name="promodis" value=<?php echo $promodiscount ?> />
                <input type="hidden" id="name" name="name" value=<?php echo (str_replace(' ', '_', $_POST['name'])) ?> />
                <input type="hidden" id="mobile" name="mobile" value=<?php echo $c_mobile ?> />
                <input type="hidden" id="email" name="email" value=<?php echo $c_email ?> />
                <input type="hidden" id="address" name="address" value=<?php echo (str_replace(' ', '_', $_POST['address'])) ?> />
                <input type="hidden" id="oid" name="oid" value=<?php echo $oid ?> />
                <input type="submit" class="btn" value="Download PDF">
                <a href="estimate.php"><p class="btn">Back</p></a>
            </div>
            <br />
            <main class="pd-15" id="main" style="min-width:600px">
                <div class="container">
                    <div class="brd">
                        <div class="brd flex pdlr">
                            <div class="col">Estimate No : <b><?php echo $oid ?></b></div>
                            <div class="col"><center><b>ESTIMATE</b></center></div>
                            <div class="col" style="text-align: end;">Date : <b><?php echo $dateonly ?></b></div>
                        </div>
                        <div class="brd flex pdlr">
                            <div class="col">Phone : <b><?php echo $site_mobile_number ?>,<?php echo $site_whatsapp_number ?></b></div>
                            <div class="col" style="text-align: end;">Email : <b><?php echo $site_email ?></b></div>
                        </div>
                        <div class="brd flex" style="flex-direction:column">
                            <div  style="width:40%"><center>
                                <p class="fw-20"><b><?php echo $site_name ?></b></p>
                                <p><?php echo $site_address ?></p>
                            </center></div>
                        </div>
                        <div class="brd flex pd-10" style="width:100%">
                            <div style="width:48%" class="rline">
                                <div><center><b>Customer Details</b></center></div>
                                <div>Name : <b><?php echo $c_name ?></b></div>
                                <div>Mobile: <b><?php echo $c_mobile ?></b></div>
                                <div>E-Mail Id : <b><?php echo $c_email ?></b></div>
                                <div>Address : <b><?php echo $c_address ?></b></div>
                                <div>State: <b><?php echo $state ?></b></div>
                            </div>
                            <div style="text-align:end;width:48%">
                                <div><center><b>Bank Details</b></center></div>
                                <div>Acc Name : <b>MUTHULAKSHMI</b></div>
                                <div>Acc Number : <b>10914621030</b></div>
                                <div>IFSC Code : <b>SBIN0000961</b></div>
                                <div>Bank Name : <b>STATE BANK OF INDIA</b></div>
                                <div>Branch : <b>SATTUR BRANCH</b></div>
                            </div>
                        </div>
                        <table style="width:100%">
                            <thead>
                                <tr class="rbd bold">
                                    <td>S.No</td>
                                    <td>Code</td>
                                    <td>Product Name</td>
                                    <td>MRP (Rs)</td>
                                    <td>Discount (%)</td>
                                    <td>Quantity</td>
                                    <td>Price (Rs)</td>
                                    <td>Amount (Rs)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $k = 1;
                                    $totalqty = 0;
                                    for($i=0;$i<($product_size-1);$i=$i+8){
                                        $pcode=$product[$i];
                                        $name=$product[$i+1];
                                        $quantity=$product[$i+2];
                                        $price=$product[$i+3];
                                        $subtotal = $product[$i+4];
                                        $mrp = $product[$i+5];            
                                        $mrptotal = $product[$i+6];
                                        $discount = $product[$i+7];         
                                        $totalqty += $quantity;
                                        if(!$row1){
                                            $iquery = "insert into `tbl_orders`(`name`, `phone`, `email`, `address`, `order_id`, `p_name`, `p_quantity`, `p_price`, `p_total`, `p_mrp`, `p_mrp_total`, `p_id`, `p_discount`, `overall_total`, `overall_mrp_total`, `date`, `packing_charge`, `promotion_discount`) values ('$c_name','$c_mobile','$c_email','$c_address','$oid','$name','$quantity','$price','$subtotal','$mrp','$mrptotal','$pcode','$discount','$finialtotal','$nettotal','$dateonly','$pcharge','$promodiscount')";
                                            $iresult = mysqli_query($conn,$iquery);
                                        }
                                ?>
                                        <tr class="rbd">
                                            <td><?php echo $k ?></td>
                                            <td><?php echo $pcode ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo number_format($mrp,2) ?></td>
                                            <td><?php echo $discount ?></td>
                                            <td><?php echo $quantity ?></td>
                                            <td><?php echo number_format($price,2) ?></td>
                                            <td><?php echo number_format($subtotal,2) ?></td>
                                        </tr>
                            <?php       $k++;
                                    } ?>
                                <tbody class="brd" style="text-align:center;">
                                    <tr class="bold">
                                        <td colspan="7" style="text-align:end;">Net Total (Rs) : </td>
                                        <td><?php echo number_format($nettotal,2) ?></td>
                                    </tr>
                                    <tr class="bold">
                                        <td colspan="7" style="text-align:end;">Discount Price (Rs) : </td>
                                        <td><?php echo number_format($disamt,2) ?></td>
                                    </tr>
                                    <tr class="bold">
                                        <td colspan="7" style="text-align:end;">Sub Total (Rs) : </td>
                                        <td ><?php echo number_format($total,2) ?></td>
                                    </tr>
                                    <!-- <tr class="bold">
                                        <td colspan="7" style="text-align:end;">Packing Charge (Rs) : </td>
                                        <td><?php# echo number_format($pcharge,2) ?></td>
                                    </tr>
                                    <tr class="bold">
                                        <td colspan="7" style="text-align:end;">Promotion Discount (Rs) : </td>
                                        <td><?php# echo number_format($promodiscount,2) ?></td>
                                    </tr> -->
                                </tbody>
                            </tbody>
                        </table>
                        <div class="brd flex pdlr">
                            <div class="col"><center>Total items : <b><?php echo $k-1 ?></center></b></div>
                            <div class="col"><center>Total Quantity : <b><?php echo number_format($totalqty) ?></b></center></div>
                            <div class="col"><center><b>Overall Total (Rs) : <?php echo number_format($finialtotal,2) ?></b></center></div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="bottom">
                <input type="submit" class="btn" value="Download PDF">
            </div>
        </form>
        <!-- footer - start -->
        <?php include("footer.php") ?>
        <!-- footer - end -->
    </body>
</html>