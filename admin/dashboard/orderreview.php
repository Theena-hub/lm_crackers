<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
$id = $_GET['order_id'];
$query = "SELECT * FROM tbl_orders WHERE order_id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('head.php') ?>
<style>
    .border-right {
        border-right: 2px solid black !important;
    }
</style>

<body class="  ">
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
                                    <h1>Hello</h1>
                                    <p>We are on a mission to help developers like you build successful projects for
                                        FREE.</p>
                                </div>
                                <div>
                                    <a href="" class="btn btn-link btn-soft-light">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.4"
                                                d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        Announcements
                                    </a>
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
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4 class="card-title text-dark">View Order</h4>
                            </div>
                            <a href="orders.php"><input type="button" class="btn btn-success" value="Orders" /></a>
                        </div>
                        <?php if ($data) { ?>
                            <div class="card-body text-dark">
                                <form action="pdf.php?order_id=<?=$data['order_id']?>" method="get" target="_blank">
                                    <div class="container pdf-content" style="border: 2px solid black;padding:0">
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="padding: 2px 12px;border-bottom:2px solid black">
                                            <p class="mb-0 fw-600">Estimate No:
                                                <?= $data['order_id'] ?>
                                            </p>
                                            <p class="mb-0 fw-600">Estimate</p>
                                            <p class="mb-0 fw-600">Date:
                                                <?= $data['date'] ?>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="padding: 2px 12px;border-bottom:2px solid black">
                                            <p class="mb-0 fw-600">
                                                <?= $site_name ?>
                                            </p>
                                            <p class="mb-0 fw-600">
                                                <?= $site_address ?>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="padding: 2px 12px;border-bottom:2px solid black">
                                            <p class="mb-0 fw-600">Mobile Number:
                                                <?= $site_mobile_number ?>
                                            </p>
                                            <p class="mb-0 fw-600">Email:
                                                <?= $site_email ?>
                                            </p>
                                        </div>
                                        <div class="" style="padding: 0px 12px;border-bottom:2px solid black">
                                            <div class="row">
                                                <div class="col-md-6"
                                                    style="padding-top:10px;padding-bottom:10px;border-right: 2px solid black;">
                                                    <h6 class="fw-700 pb-1">Customer Details</h6>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Name :</span>
                                                        <?= $data['name'] ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Mobile :</span>
                                                        <?= $data['phone'] ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Email :</span>
                                                        <?= $data['email'] ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Address :</span>
                                                        <?= $data['address'] ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Order Status :</span>
                                                        <?= $data['order_status'] ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-6" style="padding-top:10px;padding-bottom:10px;">
                                                    <h6 class="fw-700 pb-1">Account Details</h6>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Account Holder Name :</span>
                                                        <?= $account_holder_name_one ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Account Number :</span>
                                                        <?= $account_number_one ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Bank Name :</span>
                                                        <?= $bank_name_one ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">IFSC :</span>
                                                        <?= $ifsc_code_one ?>
                                                    </p>
                                                    <p class="mb-0 fw-600"><span class="fw-500">Branch :</span>
                                                        <?= $branch_one ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="">
                                            <table style="width: 100%;">
                                                <thead class="text-center" style="border-bottom: 2px solid black;">
                                                    <th class="border-right">S.No</th>
                                                    <th class="border-right">Product Name</th>
                                                    <th class="border-right">Mrp</th>                                                    
                                                    <th class="border-right">Discount</th>
                                                    <th class="border-right">Quantity</th>                                                    
                                                    <th class="border-right">Price</th>
                                                    <th>Amount</th>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    // Fetch all products for the order_id
                                                    $productQuery = "SELECT * FROM tbl_orders WHERE order_id='$id'";
                                                    $productResult = mysqli_query($conn, $productQuery);
                                                    // Counter for serial number
                                                    $counter = 1;
                                                    // Initialize variables for calculation
                                                    $netPrice = 0;
                                                    $totalItems = 0;
                                                    $totalQuantity = 0;                                                    $totalMrp = 0;
                                                    $totalQuantityMrp = 0;                                                    $totalMrp = 0;
                                                    while ($productData = mysqli_fetch_assoc($productResult)) {
                                                        ?>
                                                        <tr style="border-bottom:2px solid black;">
                                                            <td class="border-right" style="width:5%">
                                                                <?= $counter ?>
                                                            </td>
                                                            <td class="border-right">
                                                                <?= $productData['p_name'] ?>
                                                            </td>
                                                            <td class="border-right">
                                                                <?= $productData['p_mrp'] ?>
                                                            </td>                                                            
                                                            <td class="border-right">
                                                                <?= $productData['p_discount'] ?>%
                                                            </td>
                                                            <td class="border-right">
                                                                <?= $productData['p_quantity'] ?>
                                                            </td>                                                            
                                                            <td class="border-right">
                                                                <?= $productData['p_price'] ?>
                                                            </td>                                                            
                                                            <td>
                                                                <?= $productData['p_mrp_total'] ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        // Update variables for calculation
                                                        $netPrice += $productData['p_total'];                                                        
                                                        $totalItems++;                                                        
                                                        $totalQuantity += $productData['p_quantity'];                                                                                                                
                                                        $totalMrp += $productData['p_mrp'];
                                                        $totalQuantityMrp += $productData['p_mrp_total'];                                                        
                                                        $counter++;
                                                    }
                                                    $counter--;
                                                    $discountPrice = $totalQuantityMrp-$netPrice;
                                                    $overallTotal = $netPrice + $data['packing_charge'];
                                                    ?>
                                                </tbody>                                                
                                            </table>
                                            <div class="text-end" style="width: 30%;display:contents;">
                                                <p class="mb-0">Net Price:  <?=$totalQuantityMrp?></p>
                                                <p class="mb-0">Discount Price:  <?=$discountPrice?></p>
                                                <p class="mb-0">Sub Total:  <?= $netPrice ?></p>
                                                <p class="mb-0">Packing Charges:  <?=$data['packing_charge']?></p>
                                                <p class="mb-0">Promotion Discount: <?=$data['promotion_discount']?> </p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-evenly" style="border-top: 2px solid black;">
                                            <div>
                                                <p class="mb-0">Total Items: <?=$counter?></p>
                                            </div>
                                            <div>
                                                <p class="mb-0">Total Quantity: <?=$totalQuantity?></p>
                                            </div>
                                            <div>
                                                <p class="mb-0">Overall Total(RS) : <?=$overallTotal?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="order_id" value="<?= $id ?>">                                    
                                    <input type="submit" class="btn btn-success mt-3" value="Download PDF"
                                        style="float: right;" />
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Footer Section Start -->
            <?php include('footer.php') ?>
            <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->

    <!-- script - start -->
    <?php include('script.php') ?>
    <!-- script - end -->
</body>

</html>