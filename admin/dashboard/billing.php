<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include('db.php');
    $query = "select * from tbl_billing order by id desc limit 1";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $id = $row['id'] ?? 0;
    //create billing id
    $bid = 'LM'.date('Y').'BILL'.($id+1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('head.php') ?>

<body>
    <!-- loader Start -->
    <?php include('loader.php') ?>
    <!-- loader End -->
    <!-- sidenav Start -->
    <?php include('sidenav.php') ?>
    <!-- sidenav End -->
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <?php include('topnav.php') ?>
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h1>BILLING</h1>
                                </div>
                                <div>
                                    <a href="viewbilling.php"><button type="button" class="btn btn-success">
                                        View Bills
                                    </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="../assets/images/dashboard/top-header.png" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div>
            <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>

        <!-- Hero Section Start -->
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <form class="row" id="billingdata" method="POST">
                <div class="container-fluid">                                               
                    <div class="col-sm-12" style="overflowX: hidden;">
                        <div class="card">
                            <div class="row p-3 g-2 cform text-center">
                                <div class="col-12 col-lg-9 row g-2 text-center">
                                    <div class="col-12 col-sm-6 col-xxl-4 text-center"><input type="text " name="cname" id="cname" placeholder="Customer Name" required /></div>
                                    <div class="col-12 col-sm-6 col-xxl-4 text-center"><input type="number" name="cnumber" id="cnumber" placeholder="Phone Number" /></div>
                                    <div class="col-12 col-sm-6 col-xxl-4 text-center"><input type="number" name="cwhatsno" id="cwhatsno" placeholder="Whatsapp Number" /></div>
                                    <div class="col-12 col-sm-6 col-xxl-4 text-center"><input type="text" name="cidproof" id="cidproof" placeholder="Any Id proof" /></div>
                                    <div class="col-12 col-sm-6 col-xxl-4 cr-p text-center"><input type="date" name="bdate" id="bdate" /></div>
                                    <div class="col-12 col-sm-6 col-xxl-4 text-center">
                                        <select name="cmop" id="cmop" class="cr-p">
                                            <option value="" hidden>Select Payment</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Net Banking">Net Banking</option>
                                            <option value="UPI Id">UPI</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 py-2"><textarea name="caddress" id="caddress" placeholder="Customer Address..." required></textarea></div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive flex">
                                    <div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="wnor">s.no</th>
                                                </tr>
                                            </thead>
                                            <tbody  id="show_sno"></tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <table class="table table-striped" role="grid" data-bs-toggle="data-table">
                                            <thead>
                                                <tr>
                                                    <th class="wbig">Product Name</th>
                                                    <th class="wnor">MRP Price</th>
                                                    <th class="wnor">Quantity</th>
                                                    <th class="wnor">Discount (%)</th>
                                                    <th class="wnor">Discount Price</th>
                                                    <th>Total</th>
                                                    <th class="wnor">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addItems">
                                            <tr>
                                                <td class="wbig">
                                                    <input id="itemid_${itemno}" type="hidden" />
                                                    <input id="listitems_${itemno}" class="listitems" type="text" placeholder="Search here ..." onblur="checkprd()" onfocus="closelist()" onkeyup="searchitem()" />
                                                    <div class="itemlist_${itemno} itli"></div>
                                                </td>
                                                <td class="wnor"><input type="text" id="price_${itemno}" placeholder="0" value="" class="cr price" readonly></td>
                                                <td class="wnor"><input type="text" id="quantity_${itemno}" class="quantity" placeholder="0" oninput="calcQ()"></td>
                                                <td class="wnor"><input type="text" id="discount_${itemno}" placeholder="0" class="cr" readonly></td>
                                                <td class="wnor"><input type="text" id="dis_price_${itemno}" placeholder="0" class="cr" readonly></td>
                                                <td><input type="text" id="total_${itemno}" placeholder="0" class="cr b-0 total" readonly></td>
                                                <td>
                                                    <a class='btn btn-sm btn-icon btn-warning' onclick="editItem()" data-item-id="edit_${itemno}" data-bs-toggle="tooltip" title="Edit" data-bs-placement='top'>
                                                        <svg class='icon-20' data-item-id="edit_${itemno}" width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <path d='M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            <path d='M15.1655 4.60254L19.7315 9.16854' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                        </svg>
                                                    </a>
                                                    <a class='btn btn-sm btn-icon btn-danger' data-bs-toggle='tooltip' title='Delete' data-bs-placement='top' onclick='deleteItem()' data-item-id='del_${itemno}'>
                                                        <svg class='icon-20' data-item-id='del_${itemno}' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                                            <path d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            <path d='M20.708 6.23975H3.75' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            <path d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tr>
                                                <td colspan="1"  style="text-align:left;">
                                                    <button type="button" id="addBox" class="btn btn-success">Add Item</button>
                                                </td>
                                                <td colspan="1"  style="text-align:left;">
                                                    <input type="text" placeholder="Enter Your Order ID" value="" id="ex_ord_id" name="ex_ord_id" />
                                                </td>
                                                <td colspan="1"  style="text-align:left;">
                                                    <button type="button" id="addBox" class="btn btn-warning">Get Order Items</button>
                                                </td>
                                                <td class="totaltr" colspan="3">Total Quantity : <input type="number" readonly value="0" id="totalQty" name="totalQty" /></td>
                                                <td class="totaltr" colspan="1">Total Amount : </td>
                                                <td class="totaltr" colspan="1"><input type="number" readonly value="0" id="totalAmt" name="totalAmt" /></td>
                                            </tr>
                                            <tr class="totaltr">
                                                <td colspan="4"></td>
                                                <td colspan="1">RoundOff Amount : </td>
                                                <td colspan="1"><input type="number" readonly value="0" id="roAmt" name="roAmt" /></td>
                                            </tr>
                                            <tr class="totaltr">
                                                <td colspan="5"><input type="hidden" id="prdlist" name="prdlist" /></td>
                                                <td colspan="1"><button type="submit" class="btn btn-success">Submit</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Hero Section End -->

        <!-- edit section Start -->
        <section class="modal" id="editProducts">
            <div class="modal-content">
                <form method="post" id="prdbill">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="p_name">Product Name</label>
                            <input type="text" class="form-control" name="p_name" id="p_name" readonly />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="p_price">Product Price</label>
                            <input type="text" class="form-control" name="p_price" id="p_price" readonly />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="p_dis">Discount (%)</label>
                            <input type="number" class="form-control" name="p_dis" id="p_dis" oninput="calcprice()" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="p_disprice">Discount Price</label>
                            <input type="number" class="form-control" name="p_disprice" id="p_disprice" readonly />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="p_qty">Quantity</label>
                            <input type="number" class="form-control" name="p_qty" id="p_qty" oninput="calc()" required/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label" for="p_total">Total</label>
                            <input type="text" class="form-control" name="p_total" id="p_total" readonly />
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary w-100" name="editData" value="Ok" />
                </form>
                <input id="closeBtn" type='button' class="close btn btn-danger mt-3 " value="Close" />
            </div>
        </section>
        <!-- edit section End -->

        <!-- Footer Section Start -->
        <?php include('footer.php') ?>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->

    
   
    <!-- script - start -->
    <?php include('script.php') ?>
    <!-- script - end -->

    <script>
        let list=[]; itemno=1; nameList=[]; disper=80; productList = [];
        $(".totaltr").hide();

        // set min date
        let today = new Date(); 
        const dd = String(today.getDate()).padStart(2, '0');
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const yyyy = today.getFullYear();
        $("#bdate").attr('min', (yyyy+'-'+mm+'-'+dd));

        // billing page functions start
        $(window).on('scroll',() => {
            if (($(".listitems").val()) == "") {
                $(".itli").css('display', 'none');
            }
        });
        const addsno = ()=>{
            $("#show_sno").empty();
            const sno = $("#addItems tr").length;
            if(sno == 0){
                $(".totaltr").hide();
            };
            let n=1;
            while(n<=sno){
                const newsno = $('<tr></tr>').html(`<td class="wnor">${n}</td>`);
                $("#show_sno").append (newsno);
                n++;
            };
        };
        const calc = () =>{
            $("#p_qty").val($("#p_qty").val().replace(/[^0-9]/g, '').substring(0, 3));
            $("#p_total").val((($("#p_qty").val())*($("#p_disprice").val())).toFixed(2));
        };
        const closelist = () => $('.itli').hide();
        $(document).on('click', (e)=>{
            if (!$(e.target).closest('.listitems').length) {
                $('.itli').hide();
            }
        });
        const total = ()=>{
            let totalAmt = 0; qty =0;
            $(".total").each((index, element)=>{
                totalAmt += Number($(element).val());
            });
            $(".quantity").each((index, element)=>{
                if(($($(".price")[index]).val()) > 0){
                    qty += Number($(element).val());
                }
            });
            $("#totalAmt").val(totalAmt.toFixed(2));
            $("#roAmt").val(Math.round(totalAmt));
            $("#totalQty").val(qty);
        };
        const calcQ = ()=>{
            const itemid = ($(event.target).attr('id')).split("_")[1];
            $("#quantity_"+itemid).val($("#quantity_"+itemid).val().replace(/[^0-9]/g, '').substring(0, 3));
            $("#total_"+itemid).val((($("#quantity_"+itemid).val()) * ($("#dis_price_"+itemid).val())).toFixed(2));
            total();
        };
        const checkprd = ()=>{
            const itemid = ($(event.target).attr('id')).split("_")[1];
            const pname = $("#listitems_"+itemid).val();
            const item = list.filter(({name})=> name == pname)[0] || {};
            if($.isEmptyObject(item)){
                $("#listitems_"+itemid).val("");
                $("#price_"+itemid).val("");
                $("#discount_"+itemid).val("");
                $("#dis_price_"+itemid).val("");
                $("#quantity_"+itemid).val("");
            }
            calcQ();
        };
        $("#prdbill").on('submit', (e)=>{
            const itemid = ($(event.target).attr('class')).split("_")[1];
            e.preventDefault();
            $("#quantity_"+itemid).val($("#p_qty").val());
            $("#discount_"+itemid).val($("#p_dis").val());
            $("#dis_price_"+itemid).val($("#p_disprice").val());
            $("#total_"+itemid).val($("#p_total").val());
            total();
            $("#prdbill").removeClass("item_"+itemid);
            $('#editProducts').hide();
        });
        $("#closeBtn").on('click', ()=>{
            const itemid = ($(event.target).attr('class')).split("_")[1];
            $("#prdbill").removeClass("item_"+itemid);
            $('#editProducts').hide();
        });
        const calcprice = ()=>{
            $("#p_dis").val($("#p_dis").val().replace(/[^0-9]/g, '').substring(0, 2));
            const mrp = $("#p_price").val();
            $("#p_disprice").val((mrp -(mrp * ($("#p_dis").val())/100)).toFixed(2));
            calc();
        };
        const addvalues = (pid)=>{
            const itemid = ($(event.target).attr('id')).split("_")[1];
            const item = list.filter(({id})=> id == pid)[0] || {};
            $(".itemlist_"+itemid).hide();
            $("#itemid_"+itemid).val(item.id);
            $("#listitems_"+itemid).val(item.name);
            $("#price_"+itemid).val(item.mrp);
            $("#discount_"+itemid).val(disper);
            $("#dis_price_"+itemid).val((item.mrp - (item.mrp * disper/100)).toFixed(2));
            checkprd();
        };
        const deleteItem = ()=>{
            const itemid = ($(event.target).data('item-id')).split("_")[1];
            $(".item_" + itemid).remove();
            addsno();
            total();
        };
        const editItem = ()=>{
            const itemid = ($(event.target).data('item-id')).split("_")[1];
            $("#prdbill").addClass("item_"+itemid);
            $("#p_name").val($("#listitems_"+itemid).val());
            $("#p_price").val($("#price_"+itemid).val());
            $("#p_qty").val($("#quantity_"+itemid).val());
            $("#p_dis").val($("#discount_"+itemid).val());
            $("#p_disprice").val($("#dis_price_"+itemid).val());
            $("#p_total").val($("#total_"+itemid).val());
            $("#editProducts").show();
        };
        const searchitem = ()=>{
            const itemid = ($(event.target).attr('id')).split("_")[1];
            $(".itemlist_"+itemid).empty();
            let value = $("#listitems_"+itemid).val();
            const results = nameList.filter(item => item.list.toLowerCase().includes(value.toLowerCase()));
            results.map((item) => {
                let li = `<li id="no_${itemid}" class="border-bottom border-1 border-secondary" onclick="addvalues(${item.id})">${item.id} - ${item.name}</li>`;
                $(".itemlist_"+itemid).append(li);
                $(".itemlist_"+itemid).css('display','block');
            });
        };
        // billing page functions end

        // get products start
        $(document).ready( ()=>{
            $('#addBox').on('click', ()=>{
                $(".totaltr").show();
                const newItem = $('<tr></tr>').addClass("noitems item_"+itemno).html(
                    `<td class="wbig">
                        <input id="itemid_${itemno}" type="hidden" />
                        <input id="listitems_${itemno}" class="listitems" type="text" placeholder="Search here ..." onblur="checkprd()" onfocus="closelist()" onkeyup="searchitem()" />
                        <div class="itemlist_${itemno} itli"></div>
                    </td>
                    <td class="wnor"><input type="text" id="price_${itemno}" placeholder="0" value="" class="cr price" readonly></td>
                    <td class="wnor"><input type="text" id="quantity_${itemno}" class="quantity" placeholder="0" oninput="calcQ()"></td>
                    <td class="wnor"><input type="text" id="discount_${itemno}" placeholder="0" class="cr" readonly></td>
                    <td class="wnor"><input type="text" id="dis_price_${itemno}" placeholder="0" class="cr" readonly></td>
                    <td><input type="text" id="total_${itemno}" placeholder="0" class="cr b-0 total" readonly></td>
                    <td>
                        <a class='btn btn-sm btn-icon btn-warning' onclick="editItem()" data-item-id="edit_${itemno}" data-bs-toggle="tooltip" title="Edit" data-bs-placement='top'>
                            <svg class='icon-20' data-item-id="edit_${itemno}" width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                <path d='M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path d='M15.1655 4.60254L19.7315 9.16854' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            </svg>
                        </a>
                        <a class='btn btn-sm btn-icon btn-danger' data-bs-toggle='tooltip' title='Delete' data-bs-placement='top' onclick='deleteItem()' data-item-id='del_${itemno}'>
                            <svg class='icon-20' data-item-id='del_${itemno}' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                <path d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path d='M20.708 6.23975H3.75' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            </svg>
                        </a>
                    </td>`
                );
                $("#addItems").append (newItem);
                addsno();
                $.ajax({
                    type: 'POST',
                    url: 'billingbackend.php',
                    dataType: 'json',
                    data: { req_type: 'getitem'},
                    success: (response)=>{
                        // Handle success response
                        list = [...(response.product)];
                        nameList = list.map(({id,name})=>({id:id, name:name, list:(id+','+name)}));
                        itemno++;
                    },
                    error: (xhr, status, error)=>{
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        // get products end

        // number validate start
        $(document).on('input', '#cnumber', ()=>{
            $("#cnumber").val($("#cnumber").val().replace(/[^0-9]/g, '').substring(0,13));
        });
        $(document).on('input', '#cwhatsno', ()=>{
            $("#cwhatsno").val($("#cwhatsno").val().replace(/[^0-9]/g, '').substring(0,13));
        });
        // number validate end

        // bill add start
        $("#billingdata").on("submit", (e)=>{
            e.preventDefault();
            const mobile = $("#cnumber").val();
            const whatsapp = $("#cwhatsno").val();
            const bdate = $("#bdate").val();
            if(mobile !="" && !/^[6789]\d{9}$/.test(mobile)){
                Swal.fire({
                    title: "Please enter valid Mobile number!",
                    icon: "warning",
                });
                return;
            };
            if(whatsapp!="" && !/^[6789]\d{9}$/.test(whatsapp)){
                Swal.fire({
                    title: "Please enter valid Whatsapp number!",
                    icon: "warning",
                });
                return;
            };
            if(bdate!="" && !/^\d{4}-\d{2}-\d{2}$/.test(bdate)){
                Swal.fire({
                    title: "Please enter valid Date!",
                    icon: "warning",
                });
                return;
            };
            $(".noitems").each((index, element)=>{
                const id = ($(element).attr('class').split(' ')[1]).split('_')[1];
                if (($("#price_"+id).val())!="" && ($("#quantity_"+id).val())!="") {
                    let prdlist = {
                        "p_id":$("#itemid_"+id).val(),
                        "p_name":$("#listitems_"+id).val(),
                        "p_mrp":$("#price_"+id).val(),
                        "p_qty":$("#quantity_"+id).val(),
                        "p_dis":$("#discount_"+id).val(),
                        "p_disprice":$("#dis_price_"+id).val(),
                        "p_total":$("#total_"+id).val(),
                    };
                    productList.push(prdlist);
                }
            });
            $("#prdlist").val(JSON.stringify(productList));
            if(productList.length == 0){
                Swal.fire({
                    title: "Please Enter Product Details Correctly!",
                    icon: "warning",
                });
                return;
            };
            let formdata = {
                "name": $("#cname").val(),
                "bid": "<?= $bid ?>",
                "mobile": mobile,
                "whatsapp": whatsapp,
                "idproof": $("#cidproof").val(),
                "date": bdate,
                "mop": $("#cmop").val(),
                "address": $("#caddress").val(),
                "prdlist": $("#prdlist").val(),
                "amount": $("#roAmt").val(),
                "req_type": "addbill",
            };
            $.ajax({
                type: 'POST',
                url: 'billingbackend.php',
                data: formdata,
                success: (response)=>{
                    // Handle success response
                    if (response.trim() == "Bill added successfully!") {
                        window.open("billingpdf.php?bid=<?= $bid ?>", "_blank");
                        window.location.reload(true);
                    }
                },
                error: (xhr, status, error)=>{
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
        // bill add end

        $("#ex_ord_id").on('change', (e)=>{

            let formdata = {
                "order_id": $("#ex_ord_id").val(),
                "req_type": "getOrderItems",
            };
            // 
            $.ajax({
                type: 'POST',
                url: 'billingbackend.php',
                data: formdata,
                success: (response)=>{
                    alert(response);
                    $("#addItems").html(response);
                    // Handle success response
                    // if (response.trim() == "Bill added successfully!") {
                    //     window.open("billingpdf.php?bid=<?# $bid ?>", "_blank");
                    //     window.location.reload(true);
                    // }
                },
                error: (xhr, status, error)=>{
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>