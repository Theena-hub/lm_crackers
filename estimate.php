
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('head.php') ?>
        <?php include('db.php'); ?>
</head>
<body>
    <!-- navigation start -->
    <?php include('nav.php') ?>
    <!-- navigation end -->
    <main>
        <form method="post">
            <!-- Sticky Bar -->
            <section class="stick flex">
                <select class="opItems">
                    <option value="" hidden>Categorys</option>
                </select>
                <div>
                    <input id="listitems" type="" placeholder="Search here ..." onkeyup="searchitem()" value="" />
                    <div class="itemlist"></div>
                </div>
                <div><p class="pt-15">Net Amount : &#8377; <span id ="net_total">0</span> </p></div>
                <div><p class="pt-15">Amount Saved : &#8377; <span id ="saved_total">0</span> </p></div>
                <div><p class="pt-15">Total Amount : &#8377; <span id ="overall_total">0</span></p></div>
                <div><input type="button" class="btn" value="Buy Now" onclick="showCart()" /></div>
            </section>

            <!-- Minimum Order Amount -->
            <div class="fw-30">
                <center><h4 class="pt-15 min"> Minimum Order Amount Rs : &#8377; <?php echo number_format($site_minimum_order,2) ?></h4></center>
            </div>

            <!-- Item Display -->
            <section>
                <table class="table" cellspacing="0">
                    <thead class="table-headings">
                        <tr>
                            <th>Image</th>
                            <th class="code">Code</th>
                            <th>Product Name</th>
                            <th>MRP Price</th>
                            <th>Discount Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "select name, discount, id from tbl_category order by alignment asc";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result)){
                                $c_id = $row['id'];
                                $category = $row['name'];
                                $discount  = $row['discount']?$row['discount']:"0";
                                $queryitems = "select * from tbl_product where category='$category' and status=1 group by name";
                                $resultitems = mysqli_query($conn, $queryitems);
                                $row_count = mysqli_num_rows($resultitems);
                                if($row_count !== 0){
                        ?>
                                    <tr>
                                        <td colspan="7" class="fw-20 cat"><p style="margin:0" id="cat_<?php echo $c_id ?>"><?php echo $category ?> ( <?php echo $discount? $discount."% discount" : "Net Price"; ?> ) <i class="fa-solid" onload="dropDown(<?php echo $c_id ?>)"></i></p></td>
                                        <input type="hidden" id="pcat_<?php echo $c_id ?>" value="<?php echo $category ?>" />
                                        <!-- <td class="cat2 code"></td>                          -->
                                    </tr>
                                    <div id="dropitems_<?php echo $c_id ?>">
                                        <?php
                                            while($items = mysqli_fetch_array($resultitems)){
                                                $id = $items['id'];
                                                $name = $items['name'];
                                                $mrp = $items['mrp'];
                                                $type = $items['type'];
                                                $img = $items['image'];
                                                // $vid = $items['video'];
                                                $vid = "";
                                                $disprice =round($mrp-($mrp*($discount/100)),2);
                                                $image = ($img == "")?"assets/img/logo/logo.png":"images/products/".$img;
                                                $video = ($vid == "")?"":"$vid";
                                        ?>
                                                <tr>
                                                    <td><img src=<?php echo $image ?> alt="<?php echo $name ?>" onclick="showPopUp(<?php echo $id ?>)"/></td>
                                                    <td class="code"><?php echo $id ?></td>
                                                    <td><p id="pcode_<?php echo $id ?>" class="mb-0"><?php echo $name ?><br><?php echo $type ?><i class="fa-solid" onload="addList(<?php echo $id ?>)"></i></p></td>
                                                    <td><s style="color:red"> &#8377; <?php echo number_format($mrp,2) ?></s></td>
                                                    <td> &#8377; <?php echo number_format($disprice,2) ?></td>
                                                    <td>
                                                        <div>
                                                            <input class="inp" type="number" min="1" oninput="calc(<?php echo $id ?>)" id="qty_<?php echo $id ?>" value="" />
                                                            <input type="hidden" id="pimg_<?php echo $id ?>" value="<?php echo $image ?>" />                          
                                                            <input type="hidden" id="pvid_<?php echo $id ?>" value="<?php echo $video ?>" />                          
                                                            <input type="hidden" id="pid_<?php echo $id ?>" value="<?php echo $id ?>" />                                                    
                                                            <input type="hidden" id="pname_<?php echo $id ?>" value="<?php echo $name ?>" />
                                                            <input type="hidden" id="ptype_<?php echo $id ?>" value="<?php echo $type ?>" />                          
                                                            <input type="hidden" id="pmrp_<?php echo $id ?>" value="<?php echo $mrp ?>" />                          
                                                            <input type="hidden" id="pdiscount_<?php echo $id ?>" value="<?php echo $discount ?>" />                          
                                                            <input type="hidden" id="pdisprice_<?php echo $id ?>" value="<?php echo $disprice ?>" />                          
                                                            <input type="hidden" id="pcategory_<?php echo $id ?>" value="<?php echo $category ?>" />                          
                                                            <input type="hidden" id="psubtotal_<?php echo $id ?>" value="" />                                
                                                            <input type="hidden" id="pnetsubtotal_<?php echo $id ?>" value="" />                                
                                                        </div>
                                                    </td>
                                                    <td><input class="inp" type="text" id="prd_subtotal_<?php echo $id ?>" value="" readonly></td>
                                                </tr>
                                        <?php       
                                            } ?>
                                    </div> 
                    <?php       }
                            }  ?>
                    </tbody>
                </table>
                <p class="overtotal fw-30 pd-10">Overall Total : &#8377; <span id="overall_totals">0</span></p>
                <center><button type="button" onclick="showCart()" class="btn my-2">Place Your Order</button></center>
            </section>

        </form>
        <!--  -->
        <section id="cart_section"></section>
        <div id="cart_overlay"></div>
    </main>
    <?php 
        $query = "select * from tbl_orders order by id desc limit 1";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $id = $row['id'] ?? 0;
        //create billing id
        $oid = 'LM'.date('Y').'EST'.($id+1);
    ?>
    <!-- PopUp Section -->
    <section class="popupsec"></section>
    <style>
        #cart_section{
            height: 100%;
            position: fixed;
            width: 0;
            z-index: 998;
            top: 0;
            right: 0;
            background: aquamarine;
            display:none;
            overflow-y:scroll;
        }
        #cart_overlay{
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 997;
            top: 0;
            right: 0;
            background:  linear-gradient(45deg, rgb(14 14 14 / 80%), rgb(12 12 12 / 80%));
            display:none;          
        }
    </style>

    <script>
        let products = []; nameList = []; total = 0; net_total = 0; saved_total = 0; minimum_orders = <?php echo $site_minimum_order ?>;

        const calc = (id) => {
            $("#qty_"+id).val($("#qty_"+id).val().replace(/[^0-9]/g, '').substring(0, 3));
            let image = $("#pimg_"+id).val();
            let pid = $("#pid_"+id).val();
            let name = $("#pname_"+id).val();
            let type = $("#ptype_"+id).val();
            let pmrp = $("#pmrp_"+id).val();
            let disprice = $("#pdisprice_"+id).val();
            let discount = $("#pdiscount_"+id).val();
            let category = $("#pcategory_"+id).val();
            let qty = $("#qty_"+id).val();
            let ptotal = ($("#psubtotal_"+id).val());
            let pnettotal = $("#pnetsubtotal_"+id).val();
            var subtotal = Number((qty * disprice).toFixed(2));
            var netamt = qty * pmrp;
            total = Number((Number($("#overall_total").text().replace(/,/g,"")) - ptotal + subtotal).toFixed(2));
            net_total = Number((Number($("#net_total").text().replace(/,/g,"")) - pnettotal + netamt).toFixed(2));
            saved_total = Number((net_total - total).toFixed(2));
            
            $("#psubtotal_"+id).val(subtotal);
            $("#pnetsubtotal_"+id).val(netamt);
            $("#prd_subtotal_"+id).val(subtotal.toLocaleString('en-IN', { maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            $("#overall_total").text(total.toLocaleString('en-IN', { maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            $("#overall_totals").text(total.toLocaleString('en-IN', { maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            $("#net_total").text(net_total.toLocaleString('en-IN', { maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
            $("#saved_total").text(saved_total.toLocaleString('en-IN', { maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));

            add_product(pid, name, qty, pmrp, disprice, discount, image, subtotal, total, netamt);
        };

        const add_product = (id,name,quantity,mrp,price,discount,image,subtotal,total,netamt) => {
            let f = 0;
            let productID = id;
            let productName = name;
            let productMRP = mrp;
            let productDiscount = discount;
            let productPrice = price;
            let productQuantity = quantity;
            let productImage= image;
            let productTotal = subtotal;
            let productNetTotal = netamt;
            if(productID != ""){
                let newProduct = {
                    p_id: null,
                    p_name: null,
                    p_mrp: 0.00,
                    p_discount: 0.00,
                    p_price: 0.00,
                    p_quantity: 0,
                    p_image: null,
                    p_total: 0.00,
                    p_nettotal: 0.00,
                };
                newProduct.p_id = productID;
                newProduct.p_name = productName;
                newProduct.p_mrp = productMRP;
                newProduct.p_discount = productDiscount;
                newProduct.p_price = productPrice;
                newProduct.p_quantity = productQuantity;
                newProduct.p_image = productImage;
                newProduct.p_total = productTotal;
                newProduct.p_nettotal = productNetTotal;
                for (let i = 0; i < products.length; i++) {
                    if(products[i].p_id === newProduct.p_id){
                        products[i].p_id = newProduct.p_id;
                        products[i].p_name = newProduct.p_name;
                        products[i].p_mrp = newProduct.p_mrp;
                        products[i].p_discount = newProduct.p_discount;
                        products[i].p_price = newProduct.p_price;
                        products[i].p_quantity = newProduct.p_quantity;
                        products[i].p_image = newProduct.p_image;
                        products[i].p_total = newProduct.p_total;
                        products[i].p_nettotal = newProduct.p_nettotal;
                        f=1;
                    }
                }
                if(f!=1)
                    products.push(newProduct);
            } 
        };

        const dropDown = (c_id) => {
            window.scrollTo({
                top : 0,
                behavior : 'smooth'
            });
            let category = $("#pcat_"+c_id).val();
            let newitems =
                `<option value = "${c_id}"> ${category} </option>`;
            $(".opItems").append(newitems);
        };

        $('.opItems').on('change',(event) => {
            const selectedOption = $(event.target).val();
            const selectedDiv = $('#cat_' + selectedOption);
            if (selectedDiv.length) {
                selectedDiv[0].scrollIntoView({ behavior: 'smooth', block: 'start'});
                window.scrollBy({
                    top: selectedDiv[0].getBoundingClientRect().top - 80,
                    behavior: 'smooth'
                });
            }
        });

        const addList = (id) => {
            let name = $("#pname_"+id).val();
            nameList.push({id:id, name:name});
        };

        const searchitem = () => {
            $(".itemlist").empty();
            let value = $("#listitems").val();
            const results = nameList.filter(item => item.name.toLowerCase().includes(value.toLowerCase()));
            results.map((item) => {
                let li = `<li onclick="moveto(${item.id})">${item.name}</li>`;
                $(".itemlist").append(li);
                $(".itemlist").css('display','block');
            })
        };

        const moveto = (id) => {
            const pcode = $("#pcode_"+id);
            pcode[0].scrollIntoView({ behavior: 'smooth', block: 'start'});
            window.scrollBy({
                top: pcode[0].getBoundingClientRect().top - 80,
                behavior: 'smooth'
            });
            $(".itemlist").css('display','none');
            $("#listitems").val("");
        };

        $(window).on('scroll',() => {
            if (($("#listitems").val()) == "") {
                $(".itemlist").css('display','none');
            }
        });

        const showPopUp = (id) => {
            let name = $("#pname_"+id).val();
            let image = $("#pimg_"+id).val();
            let video = $("#pvid_"+id).val();
            $(".popupsec").empty();
            let newDiv = $("<div></div>").addClass("pop").html(
                `<div class="pd-10 fw-20 flex bb-2" style="justify-content: space-between"> 
                    <p>${name}</p>
                    <button class="btn" onclick="closePopUp()">&times;</button>
                </div>
                <div class="pd-15 imgdiv"><img style="max-width:450px;max-height:450px" src=${image} alt="${name}" /></div>
                <div class=" pd-15 videodiv" style="display: none">
                    <video width="640px" height="360px" controls>
                        <source src=${video} type="video/mp4" alt="${name}" />
                    </video>
                </div>
                <div class="bt-2 pd-10 flex">
                    <img class="thumbnail" src=${image} alt="image" onclick="change('img')" />
                    <i class="fa-brands fa-youtube icon" onclick="change('video')"></i>
                </div>`
            );
            $(".popupsec").append(newDiv);
            $(".popupsec").css('display', 'flex');
        };

        const closePopUp = () => {
            $(".popupsec").hide();
        };

        const change = (value) => {
            if(value == "img"){
                $(".imgdiv").css('display', 'block');
                $(".videodiv").css('display', 'none');
            }else{
                $(".imgdiv").css('display', 'none');
                $(".videodiv").css('display', 'block');
            }
        };
        // 
        const overall = () => {
            const packingCharge = Number($("#pcharge").val());
            const promodis = Number($("#promodis").val());
            const overall = Math.ceil(total) + packingCharge - promodis;
            $(".overallTotoal").text((Number((overall).toFixed(2))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));
        };

        const addData = (productsCart) => {
            $(".dataAdd").empty();
            productsCart.map((items)=>{
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
        // 
        const showCart = () => {
            sessionStorage.setItem("products",  JSON.stringify(products));
            if(total >= minimum_orders){
                Swal.fire({
                    title: `Your Order Value is : ₹ ${Math.ceil(total).toLocaleString()}`,
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $("#cart_section").append('<section><h1 class="cat" style="margin:0"><center>Products</center></h1><table class="table" cellspacing="0"><thead class="table-headings fw-20"><tr><th>Image</th><th>Product Name</th><th>MRP Price</th><th>Qty</th><th>Discount Price</th><th>Total</th></tr></thead><tbody class="dataAdd"></tbody></table><p class="overtotal fw-20 pd-10"> Total : &#8377; <span class="totals">0</span></p></section><form action="orderreview.php" method="post" id="form"><h1 class="cat" style="margin:0;"><center>Fill Details</center></h1><section class="details flex"><input type="hidden" id="content" name="content" value="" /><input type="hidden" id="state" name="state" value="" /><input type="hidden" id="total" name="total" value="" /><input type="hidden" id="nettotal" name="nettotal" value="" /><input type="hidden" id="pcharge" name="pcharge" value=0 /><input type="hidden" id="oid" name="oid" value=<?php echo $oid ?> /><input type="hidden" id="promodis" name="promodis" value=0 /><br /><input type="text" maxlength="30" name="name" placeholder="Enter Your Name" required /><br /><input type="number" name="mobile" placeholder="Enter Your Mobile Number" id="mobile" required /><br /><input type="email" name="email" placeholder="Enter Your Email Id" id="email" required /><br /><textarea name="address" placeholder="Enter Your Address" required></textarea><br /><label for="promo" id="hpc" class="fw-20">Have Promotion Code ?</label><input type="text" id="promo" style="display:none;cursor: pointer;"><br /><section class="fw-20"><p class="overtotal pd-10"> Minimum Order : &#8377; <span id="minimumOrder"><?php number_format($site_minimum_order,2) ?></span></p><p class="overtotal pd-10"> Total : &#8377; <span class="totals">0</span></p><p class="overtotal pd-10"> Overall Total : &#8377; <span class="overallTotoal">0.00</span></p></section><br /><input class="btn" type="submit" value="Confirm Order" /><br /></section></form>');
                        $("#cart_section").css("display","block");
                        $("#cart_section").css("width","50%");
                        // $("#cart_section").css("transform","translate()");
                        $("#cart_section").css("transition",".5s");
                        $("#cart_overlay").css("display","block");
                        
                        // window.location.href = "cart.php";

                        // New
                        const productsCart = JSON.parse(sessionStorage.getItem("products"));
                        let alldata = "", miniOrder;
                        for (let i in productsCart) {
                            alldata += productsCart[i].p_id + ",";
                            alldata += productsCart[i].p_name + ",";
                            alldata += productsCart[i].p_quantity + ",";
                            alldata += productsCart[i].p_price + ",";
                            alldata += productsCart[i].p_total + ",";
                            alldata += productsCart[i].p_mrp + ",";
                            alldata += productsCart[i].p_nettotal + ",";
                            alldata += productsCart[i].p_discount + ",";
                        };
                        const total = productsCart.reduce((acc, item) => acc + item.p_total, 0);
                        $("#content").val(alldata);
                        $("#total").val(Math.ceil(total));
                        $("#nettotal").val((Math.ceil(productsCart.reduce((acc, item) => acc + item.p_nettotal, 0))));
                        $(".totals").text(((Math.ceil(total))).toLocaleString('en-IN',{ maximumFractionDigits: 2, minimumFractionDigits: 2, useGrouping: true }));

                        overall();
                        addData(productsCart);
                        // New End
                    }
                });
            }else{
                Swal.fire({
                    title: `Your Minimum Order value must be : ₹ ${minimum_orders.toLocaleString()}`,
                    icon: "warning"
                });
            }
        };
    </script>
    <script>
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
    <!-- footer - start -->
    <?php include("footer.php") ?>
    <!-- footer - end -->
</body>
</html>