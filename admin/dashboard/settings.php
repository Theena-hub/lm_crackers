<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('head.php') ?>

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
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title text-dark">Site Settings</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="siteSettings">
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="site_name">Site Name</label>
                                            <input type="text" class="form-control" name="site_name" id="site_name"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="site_minimum_order">Site Minimum Order</label>
                                            <input type="text" class="form-control" name="site_minimum_order"
                                                id="site_minimum_order" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="site_discount">Site Discount</label>
                                            <input type="text" class="form-control" name="site_discount"
                                                id="site_discount" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="billing_discount">Billing Discount</label>
                                            <input type="text" class="form-control" name="billing_discount"
                                                id="billing_discount" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="whatsapp_number">Whatsapp Number</label>
                                            <input type="text" class="form-control" name="whatsapp_number"
                                                id="whatsapp_number" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number"
                                                id="mobile_number" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="googlepay_number">GooglePay Number</label>
                                            <input type="text" class="form-control" name="googlepay_number"
                                                id="googlepay_number" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="phonepay_number">Phonepay Number</label>
                                            <input type="text" class="form-control" name="phonepay_number"
                                                id="phonepay_number" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="email">Email ID</label>
                                            <input type="email" class="form-control" name="email" id="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="googlemap_location_url">GoogleMap Location URL</label>
                                            <input type="text" class="form-control" name="googlemap_location_url"
                                                id="googlemap_location_url" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="bank_name_one">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name_one"
                                                id="bank_name_one" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="account_holder_name_one">Account Holder Name</label>
                                            <input type="text" class="form-control" name="account_holder_name_one"
                                                id="account_holder_name_one" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="account_number_one">Account Number</label>
                                            <input type="text" class="form-control" name="account_number_one"
                                                id="account_number_one" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="ifsc_code_one">IFSC</label>
                                            <input type="text" class="form-control" name="ifsc_code_one"
                                                id="ifsc_code_one" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="branch_one">Branch</label>
                                            <input type="text" class="form-control" name="branch_one" id="branch_one"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="bank_name_two">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name_two"
                                                id="bank_name_two" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="account_holder_name_two">Account Holder Name</label>
                                            <input type="text" class="form-control" name="account_holder_name_two"
                                                id="account_holder_name_two" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="account_number_two">Account Number</label>
                                            <input type="text" class="form-control" name="account_number_two"
                                                id="account_number_two" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="ifsc_code_two">IFSC</label>
                                            <input type="text" class="form-control" name="ifsc_code_two"
                                                id="ifsc_code_two" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <label for="branch_two">Branch</label>
                                            <input type="text" class="form-control" name="branch_two" id="branch_two"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="req_type" id="req_type" value="update">
                                <input id="update-btn" type="button" value="edit"
                                    class="btn btn-success text-uppercase d-flex m-auto">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <?php include('footer.php') ?>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->
    <!-- editCategory Modal - end -->
    <!-- script - start -->
    <?php include('script.php') ?>
    <!-- script - end -->
    <script>
        $(document).ready(function () {
            // fetching data - start
            $('<input>').attr('type', 'hidden').attr('name', 'editId').attr('id', 'editId').appendTo('#siteSettings');
            var formData = $('<input>').attr('type', 'hidden').attr('name', 'req_type').attr('id', 'req_type').attr('value', 'fetch');
            formData.append(formData);
            $.ajax({
                type: 'POST',
                url: 'backend-settings.php',
                data: formData,
                success: function (response) {
                    var result = JSON.parse(response);
                    if (result) {
                        $('#editId').val(result.id);
                        var data = result.site_data;
                        var json_data = JSON.parse(data)
                        $('#site_name').val(json_data.site_name);
                        $('#site_discount').val(json_data.site_discount);
                        $('#billing_discount').val(json_data.billing_discount);
                        $('#whatsapp_number').val(json_data.whatsapp_number);
                        $('#mobile_number').val(json_data.mobile_number);
                        $('#email').val(json_data.email);
                        $('#googlemap_location_url').val(json_data.googlemap_location_url);
                        $('#site_minimum_order').val(json_data.site_minimum_order);
                        $('#address').val(json_data.address);
                        $('#googlepay_number').val(json_data.googlepay_number);
                        $('#phonepay_number').val(json_data.phonepay_number);
                        // bank one details
                        $('#bank_name_one').val(json_data.bank_name_one);
                        $('#account_holder_name_one').val(json_data.account_holder_name_one);
                        $('#account_number_one').val(json_data.account_number_one);
                        $('#ifsc_code_one').val(json_data.ifsc_code_one);
                        $('#branch_one').val(json_data.branch_one);
                        // bank two details
                        $('#bank_name_two').val(json_data.bank_name_two);
                        $('#account_holder_name_two').val(json_data.account_holder_name_two);
                        $('#account_number_two').val(json_data.account_number_two);
                        $('#ifsc_code_two').val(json_data.ifsc_code_two);
                        $('#branch_two').val(json_data.branch_two);
                    }
                },
                error: function (xhr, status, err) {
                    console.log(err);
                }
            });
            // fetching data - end
            // update data - start
            $('#update-btn').click(function () {
                if ($('#update-btn').val() === 'edit') {
                    $('.form-control').removeAttr('readonly');
                    $('#update-btn').val('update');
                } else if ($('#update-btn').val() === 'update') {
                    var formData = $("#siteSettings").serialize();
                    console.log(formData);
                    $.ajax({
                        type: 'POST',
                        url: 'backend-settings.php',
                        data: formData,
                        success: function (response) {
                            console.log(response);
                            $('#update-btn').val('edit');
                            $('.form-control').attr('readonly', true); // Set the inputs back to readonly if needed
                        },
                        error: function (xhr, status, err) {
                            console.log(err);
                        }
                    });
                }
            });
            // update data - end
        });       
    </script>
</body>

</html>