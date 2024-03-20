<!DOCTYPE html>
<html lang="en">

<?php include('head.php')?>

<body>
    <!-- navigation start -->
    <?php include("nav.php") ?>
    <!-- navigation end -->
    <!-- hero Section - start -->
    <div class="container-fluid about" style="padding-bottom:40px" >
        <div>
            <h1 class="fw-600 text-center pd-15 cat">Payment Information</h1>
        </div>
        <div class="container overlay">
            <div class="row rowGap">
                <div class="col-lg-4">
                    <div class="card">
                        <h1 class="titleFour text-center fw-600 blackTwo">Bank Details</h1>
                        <p class="description text-center fw-600 blackThree">NAME : <?= $account_holder_name_one ?></p>
                        <p class="description text-center fw-600 blackThree">A/c NO : <?= $account_number_one ?></p>
                        <p class="description text-center fw-600 blackThree">IFSC NO : <?= $ifsc_code_one ?></p>
                        <p class="description text-center fw-600 blackThree">BANK : <?= $bank_name_one ?></p>
                        <p class="description text-center fw-600 blackThree">BRANCH : <?= $branch_one ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <h1 class="titleFour text-center fw-600 blackTwo">Google Pay</h1>
                        <p class="description text-center fw-600 blackThree">Phone no : <?= $site_googlepay_number ?></p>
                        <!-- <p class="description text-center fw-600 blackThree">Phone no : 99420 86274</p> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <h1 class="titleFour text-center fw-600 blackTwo">Phone Pay</h1>
                        <p class="description text-center fw-600 blackThree">Phone no : <?= $site_phonepay_number ?></p>
                        <!-- <p class="description text-center fw-600 blackThree">Phone no : 99420 86274</p> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <h1 class="titleFour text-center fw-600 blackTwo">Bank Details</h1>
                        <p class="description text-center fw-600 blackThree">NAME : <?= $account_holder_name_two ?></p>
                        <p class="description text-center fw-600 blackThree">A/c NO : <?= $account_number_two ?></p>
                        <p class="description text-center fw-600 blackThree">IFSC NO : <?= $ifsc_code_two ?></p>
                        <p class="description text-center fw-600 blackThree">BANK : <?= $bank_name_two ?></p>
                        <p class="description text-center fw-600 blackThree">BRANCH : <?= $branch_two ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero Section - end -->
    <!-- footer - start -->
    <?php include('footer.php') ?>
    <!-- footer - end  -->
    <!-- whatsapp icon start -->
    <?php include('whatsapp.php') ?>
    <!-- whatsapp icon end  -->
</body>
</html>  