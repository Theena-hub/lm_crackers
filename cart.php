<?php 
    include('admin/dashboard/db.php');
    $query = "select * from tbl_orders order by id desc limit 1";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $id = $row['id'] ?? 0;
    //create billing id
    $oid = 'LM'.date('Y').'EST'.($id+1);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('head.php') ?>
    <body>
        <!-- navigation start -->
        <?php include('nav.php') ?>
        <!-- navigation end -->
        <main>
            <section>
                <h1 class="cat" style="margin:0"><center>Products</center></h1>
                <table class="table" cellspacing="0">
                    <thead class="table-headings fw-20">
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>MRP Price</th>
                            <th>Qty</th>
                            <th>Discount Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="dataAdd"></tbody>
                </table>
                <p class="overtotal fw-20 pd-10"> Total : &#8377; <span class="totals">0</span></p>
            </section>
            
            <form action="orderreview.php" method="post" id="form">
                <h1 class="cat" style="margin:0;"><center>Fill Details</center></h1>
                <section class="details flex">
                    <input type="hidden" id="content" name="content" value="" />
                    <input type="hidden" id="state" name="state" value="" />
                    <input type="hidden" id="total" name="total" value="" />
                    <input type="hidden" id="nettotal" name="nettotal" value="" />
                    <input type="hidden" id="pcharge" name="pcharge" value=0 />
                    <input type="hidden" id="oid" name="oid" value=<?php echo $oid ?> />
                    <input type="hidden" id="promodis" name="promodis" value=0 /><br />
                    <input type="text" maxlength="30" name="name" placeholder="Enter Your Name" required /><br />
                    <input type="number" name="mobile" placeholder="Enter Your Mobile Number" id="mobile" required /><br />
                    <input type="email" name="email" placeholder="Enter Your Email Id" id="email" required /><br />
                    <textarea name="address" placeholder="Enter Your Address" required></textarea><br />
                    <!-- <select class="select state" required>
                        <option value="" hidden>Select State</option>
                        <?php
                            // $squery = "select * from `tbl_state` where status=1";
                            // $sresult = mysqli_query($conn, $squery);
                            // while($srow = mysqli_fetch_array($sresult)){
                            //     $minimumOrder =($srow['minimum_order_value'] == "")? $site_minimum_order : $srow['minimum_order_value'];
                            //     $state = $srow['state'];
                            //     $charge = $srow['packing_charge'];
                        ?>
                            <option value="<?php# echo $state ?>/<?php# echo $charge ?>/<?php#  $minimumOrder ?>"><?php# echo $state ?></option>
                    <?php# } ?>
                    </select><br /> -->
                    <!-- <label for="promo" id="hpc" class="fw-20">Have Promotion Code ?</label>
                    <input type="text" id="promo" style="display:none;cursor: pointer;"><br /> -->
                    <section class="fw-20">
                        <p class="overtotal pd-10"> Minimum Order : &#8377; <span id="minimumOrder"><?= number_format($site_minimum_order,2) ?></span></p>
                        <p class="overtotal pd-10"> Total : &#8377; <span class="totals">0</span></p>
                        <!-- <p class="overtotal pd-10"> Packing Charge : &#8377; <span class="packingCharge">0.00</span></p>
                        <p class="overtotal pd-10"> Promotion Discount : &#8377; <span class="promoDiscount">0.00</span></p> -->
                        <p class="overtotal pd-10"> Overall Total : &#8377; <span class="overallTotoal">0.00</span></p>
                    </section><br />
                    <input class="btn" type="submit" value="Confirm Order" /><br />
                </section>
            </form>
        </main>

        <!-- footer - start -->
        <?php include("footer.php") ?>
        <!-- footer - end -->

        <script>
            const products = JSON.parse(sessionStorage.getItem("products"));
            let alldata = "", miniOrder;
            for (let i in products) {
                alldata += products[i].p_id + ",";
                alldata += products[i].p_name + ",";
                alldata += products[i].p_quantity + ",";
                alldata += products[i].p_price + ",";
                alldata += products[i].p_total + ",";
                alldata += products[i].p_mrp + ",";
                alldata += products[i].p_nettotal + ",";
                alldata += products[i].p_discount + ",";
            };
            const total = products.reduce((acc, item) => acc + item.p_total, 0);
            $("#content").val(alldata);
            $("#total").val(Math.ceil(total));
            $("#nettotal").val((Math.ceil(products.reduce((acc, item) => acc + item.p_nettotal, 0))));
            $(".totals").text(((Math.ceil(total))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));

            const overall = () => {
                const packingCharge = Number($("#pcharge").val());
                const promodis = Number($("#promodis").val());
                const overall = Math.ceil(total) + packingCharge - promodis;
                $(".overallTotoal").text((Number((overall).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            };

            const addData = () => {
                $(".dataAdd").empty();
                products.map((items)=>{
                    if(items.p_quantity > 0){
                        let newDiv = 
                            `<tr>
                                <td><img src=${items.p_image} alt="${items.p_name}"></td>
                                <td>${items.p_name}</td>
                                <td> &#8377; ${(Number(Number(items.p_mrp).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true })}</td>
                                <td>${items.p_quantity}</td>
                                <td> &#8377; ${(Number(Number(items.p_price).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true })}</td>
                                <td> &#8377; ${(Number((items.p_total).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true })}</td>
                            </tr>`;
                        $(".dataAdd").append(newDiv);
                    }
                })
            }
            addData();

            $(document).on('input', '#mobile', ()=>{
                $("#mobile").val($("#mobile").val().replace(/[^0-9]/g, '').substring(0,10));
            });
            // $(".state").on("change", (event) => {
            //     const option = $(event.target).val();
            //     if(option){
            //         const state = option.split("/")[0];
            //         const charge = Number(option.split("/")[1]);
            //         miniOrder = Number(option.split("/")[2]);
            //         $("#state").val(state);
            //         $("#pcharge").val(charge);
            //         $(".packingCharge").text((Number((charge).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            //         $("#minimumOrder").text((Number((miniOrder).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            //     }else{
            //         $("#pcharge").val(0);
            //         $(".packingCharge").text("0.00");
            //     }
            //     overall();
            // });

            $("#hpc").on("click", () => {
                $("#promo").toggle();
            });

            $("#promo").on("keyup", (event) => {
                const code = $(event.target).val()
                let formData = {
                    'promocode': code,
                    'req_type': 'checkCode'
                };
                $.ajax({
                    type: "POST",
                    url: "backend.php",
                    data: formData,
                    success: (response)=> {
                        if (response.trim() == "No Discount") {
                            $(".promoDiscount").text("0.00");
                            $("#promodis").val(0);
                            overall();
                        }else{
                            const amt = Math.round(total * (response/100));
                            Swal.fire({
                                text: `Congratulation! You got a discount of Rs. ${amt.toLocaleString()}`,
                                icon: "success"
                            }).then(()=>{
                                $("#promodis").val(Number(amt));
                                $(".promoDiscount").text((Number((amt).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
                                overall();
                            });
                        }
                    },
                    error: (error)=> {
                        console.log(error);
                    }
                });
            });

            $("#form").on("submit", (event) => {
                // event.preventDefault();
                if(!/^[6789]\d{9}$/.test($("#mobile").val())){
                    Swal.fire({
                        title: "Please enter valid Mobile number!",
                        icon: "warning",
                    });
                    return false;
                };
                if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($("#email").val())){
                    Swal.fire({
                        title: "Please enter valid Email Id!",
                        icon: "warning",
                    });
                    return false;
                };
                if(total <= miniOrder){
                    Swal.fire({
                        title: `Minimum Order Value for Your State : ₹ ${miniOrder}`,
                        icon: "warning"
                    });
                    return false;
                }else{
                    // window.location.href = "";
                    sessionStorage.setItem("products",  JSON.stringify([]));
                    return true;
                }
            });
            overall();
        </script>
    </body>
</html>