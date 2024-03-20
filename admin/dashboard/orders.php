<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
// Fetch categories from the database
$query = "SELECT DISTINCT order_id, name, phone, address,order_status FROM tbl_orders WHERE status=1 ORDER BY order_id DESC";
$result = mysqli_query($conn, $query);
$ordersData = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                                <h4 class="card-title">Orders List</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Order Status</th>
                                            <th>View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serialNumber = 1;
                                        foreach ($ordersData as $data): ?>
                                            <tr>
                                                <td>
                                                    <?= $serialNumber++ ?>
                                                </td>
                                                <td>
                                                    <?= $data['order_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['name'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['phone'] ?>
                                                </td>
                                                <td class="d-flex justify-content-between">
                                                    <?= $data['order_status'] ?>
                                                    <a class="btn btn-sm btn-icon btn-warning edit-btn"
                                                        data-id='<?= $data['order_id'] ?>'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none'
                                                                xmlns='http://www.w3.org/2000/svg'>
                                                                <path
                                                                    d='M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341'
                                                                    stroke='currentColor' stroke-width='1.5'
                                                                    stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path fill-rule='evenodd' clip-rule='evenodd'
                                                                    d='M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z'
                                                                    stroke='currentColor' stroke-width='1.5'
                                                                    stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M15.1655 4.60254L19.7315 9.16854'
                                                                    stroke='currentColor' stroke-width='1.5'
                                                                    stroke-linecap='round' stroke-linejoin='round'></path>
                                                            </svg>
                                                        </span>
                                                        EDIT
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="orderreview.php?order_id=<?=$data['order_id']?>" class="btn btn-sm btn-icon btn-danger view-btn"
                                                        data-id='<?= $data['id'] ?>'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none'
                                                                xmlns='http://www.w3.org/2000/svg'>
                                                                <path
                                                                    d='M12 2C6.487 2 2 6.487 2 12s4.487 10 10 10 10-4.487 10-10S17.513 2 12 2zm0 18C7.589 20 4 16.411 4 12S7.589 4 12 4s8 3.589 8 8-3.589 8-8 8zm-1.414-4.586c.78.78.805 2.028.046 2.827s-2.047.734-2.827-.046l-1.415-1.414c-2.588-2.588-2.588-6.777 0-9.365 2.588-2.588 6.777-2.588 9.365 0 2.588 2.588 2.588 6.777 0 9.365l-1.415 1.414c-.78.78-2.028.805-2.827.046s-.734-2.047.046-2.827l1.415-1.414c-1.952-1.952-4.573-2.588-6.777-.046z'
                                                                    fill='currentColor'></path>
                                                            </svg>
                                                        </span>
                                                        VIEW
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-icon btn-danger delete-btn"
                                                        data-id='<?= $data['order_id'] ?>'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none'
                                                                xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                                                <path
                                                                    d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826'
                                                                    stroke='currentColor' stroke-width='1.5'
                                                                    stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M20.708 6.23975H3.75' stroke='currentColor'
                                                                    stroke-width='1.5' stroke-linecap='round'
                                                                    stroke-linejoin='round'></path>
                                                                <path
                                                                    d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973'
                                                                    stroke='currentColor' stroke-width='1.5'
                                                                    stroke-linecap='round' stroke-linejoin='round'></path>
                                                            </svg>
                                                        </span>
                                                        DELETE
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
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
    <div id="overlay" class="editoverlay">
        <div id="popup" class="editpopup orderstatus-popup">
            <h3 class="text-center mb-2">Edit Status</h3>
            <form id='editData'>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="form-label" for="status">Order Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Ordered">Orderded</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="editId" id="editId" value="">
                <input type="hidden" name="req_type" id="req_type" value="update-order-status">
                <input type="submit" class="btn btn-primary w-100" value="submit" />
            </form>
            <input id="closePopup" type="button" class="close btn btn-danger mt-3 w-100" value="Close">
        </div>
    </div>
    <!-- script - start -->
    <?php include('script.php') ?>
    <!-- script - end -->
    <script>
        // popup box         
        // script for edit popup box open
        $('.edit-btn').click(function () {
            $('.editoverlay').fadeIn();
            $('.editpopup').fadeIn();
        });
        // script for edit popup box close 
        $('.close').click(function () {
            $('.editoverlay').fadeOut();
            $('.editpopup').fadeOut();
        });
        $(document).ready(function () {
            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: 'ordersbackend.php',
                    data: { req_type: 'fetch', id: id },
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            // Populate the form with fetched data
                            $('#editId').val(data.data.order_id);
                            $('#status').val(data.data.order_status);
                            // Show the popup
                            $('.editoverlay').fadeIn();
                            $('.editpopup').fadeIn();
                        } else {
                            // Handle error
                            console.error(data.error);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
            // update order status
            $('#editData').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'ordersbackend.php',
                    data: formData,
                    success: function (response) {
                        // Show the popup
                        $('.editoverlay').fadeOut();
                        $('.editpopup').fadeOut();
                        Swal.fire({
                            title: 'Updated!',
                            text: response,
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
            // delete data
            // delete - start
            $('.delete-btn').click(function () {
                var id = $(this).data('id');                
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You Want to Delete this Data!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "POST",
                            url: 'ordersbackend.php',
                            data: { req_type: 'delete', id: id },
                            success: function (response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: response,
                                }).then((response) => {
                                    if (response.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            },
                            error: function (xhr, status, error) {
                                console.log('Error:', xhr.responseText); // Log the specific error message
                            }
                        });
                    }
                });
            });
            // delete - end            
        });
    </script>
</body>

</html>