
<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include('db.php');
    // Fetch data from the database
    $query = "SELECT * FROM tbl_billing where status>='1'";
    $result = mysqli_query($conn, $query);
    $billItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                                        <h1>BILL LIST</h1>
                                    </div>
                                    <div>
                                        <a href="billing.php"><button type="button" class="btn btn-success">
                                            Billing
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Billing No</th>
                                                <th class="text-center">Customer Name</th>
                                                <th class="text-center">Customer Number</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='record'>
                                            <?php
                                                $serialNumber = 1;
                                                foreach ($billItems as $bitem) {
                                                    $date = explode(" ", $bitem['created_on']);
                                                    $id = $bitem['id'];
                                            ?>
                                                    <tr>
                                                        <td><?= $serialNumber++ ?></td>
                                                        <td><?= $date[0] ?></td>
                                                        <td><?= $bitem['bid'] ?></td>
                                                        <td><?= $bitem['name'] ?></td>
                                                        <td><?= $bitem['mobile'] ?></td>
                                                        <td>&#8377; <?= number_format($bitem['amount']) ?></td>
                                                        <td>
                                                            <select class="status_<?= $id ?>" onchange="statuschg(<?= $id ?>)">
                                                                <option value='1' <?= ($bitem['status']==1)?'selected':'';?>>Pending</option>
                                                                <option value='2' <?= ($bitem['status']==2)?'selected':'';?>>Completed</option>
                                                                <option value='3' <?= ($bitem['status']==3)?'selected':'';?>>Cancelled</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a class='btn btn-sm btn-icon btn-success' href='billingpdf.php?bid=<?= $bitem['bid'] ?>' target='_blank' data-bs-toggle='tooltip' title='View' data-bs-placement='top'>
                                                                <svg class='icon-20' width='20' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' stroke='currentColor'>
                                                                    <path fill='#fff' d='M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z'/>
                                                                </svg>
                                                            </a>                                                       
                                                            <a class='btn btn-sm btn-icon btn-danger' onclick="deleteItem(<?= $id ?>)" data-bs-toggle='tooltip' title='Delete' data-bs-placement='top'>
                                                                <svg class='icon-20' data-item-id='<?= $id ?>' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                                                    <path d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                    <path d='M20.708 6.23975H3.75' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                    <path d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                </svg>
                                                            </a>                                                       
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Section End -->

            <!-- Footer Section Start -->
            <?php include('footer.php') ?>
            <!-- Footer Section End -->
        </main>

        <!-- Library Bundle Script -->
        <script src="../assets/js/core/libs.min.js"></script>
        
        <!-- External Library Bundle Script -->
        <script src="../assets/js/core/external.min.js"></script>
        
        <!-- Widgetchart Script -->
        <script src="../assets/js/charts/widgetcharts.js"></script>
        
        <!-- mapchart Script -->
        <script src="../assets/js/charts/vectore-chart.js"></script>
        <script src="../assets/js/charts/dashboard.js" ></script>
        
        <!-- fslightbox Script -->
        <script src="../assets/js/plugins/fslightbox.js"></script>
        
        <!-- Settings Script -->
        <script src="../assets/js/plugins/setting.js"></script>
        
        <!-- Slider-tab Script -->
        <script src="../assets/js/plugins/slider-tabs.js"></script>
        
        <!-- Form Wizard Script -->
        <script src="../assets/js/plugins/form-wizard.js"></script>
        
        <!-- App Script -->
        <script src="../assets/js/hope-ui.js" defer></script>

        <script>
            // status change - start
            const statuschg = (id)=>{
                $.ajax({
                    type: "POST",
                    url: 'billingbackend.php',
                    data:{
                        'status': $(".status_"+id).val(),
                        'id': id,
                        'req_type': 'status',
                    },
                    success: (response)=>{
                        if (response.trim() === "Status Updated successfully!") {
                            Swal.fire({
                                title: "Status Updated successfully",
                                icon: "success"
                            });
                        } else {
                            console.log(response.trim());
                        }
                    },
                    error: (error)=>{
                        console.log(error);
                    }
                });
            };
            //status change -end

            // delete bill - start
            const deleteItem = (id)=>{
                const itemId = $(event.target).data('item-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'billingbackend.php',
                            data: { req_type: 'delete', id: itemId },
                            success: (response)=>{
                                if (response.trim() === "Bill deleted successfully!") {
                                    Swal.fire({
                                        title: "Bill Deleted",
                                        icon: "success"
                                    }).then(()=>{
                                        window.location.reload(true);
                                    });
                                } else {
                                    console.log(response.trim());
                                }
                            },
                            error: (error)=>{
                                console.log(error);
                            }
                        });
                    }
                });
            };
            // delete bill end
        </script>
    </body>
</html>