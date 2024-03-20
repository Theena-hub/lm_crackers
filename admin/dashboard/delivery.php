<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include('db.php');
    // Fetch categories from the database
    $query = "SELECT * FROM tbl_state where status='1'";
    $result = mysqli_query($conn, $query);
    $statelist = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                                    <h1>Delivery State List</h1>
                                </div>
                                <div>
                                    <button type="button" id="addCategoryBox" class="btn btn-success" data-toggle="modal">
                                        Add Delivery Details
                                    </button>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped" role="grid"
                                    data-bs-toggle="data-table">
                                    <thead>
                                        <tr class="ligth">
                                            <th>S.No</th>
                                            <th>State</th>
                                            <th>Minimum Order value</th>
                                            <th>Packing Charge</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id='record'>
                                        <?php
                                        $serialNumber = 1;
                                        foreach ($statelist as $state) {
                                            $id = $state['id'];
                                            echo "<tr>";
                                            echo "<td>" . $serialNumber++ . "</td>";
                                            echo "<td>" . $state['state'] . "</td>";
                                            echo "<td> ₹ " . number_format($state['minimum_order_value']) . "</td>";
                                            echo "<td> ₹ " . number_format($state['packing_charge']) . "</td>";

                                            echo "<td>
                                                    <a class='btn btn-sm btn-icon btn-warning editState' data-bs-toggle='tooltip' title='Edit' data-bs-target='#editCategoryModal' data-state-id='" . $id . "'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                                <path d='M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path fill-rule='evenodd' clip-rule='evenodd' d='M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M15.1655 4.60254L19.7315 9.16854' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            </svg>
                                                        </span>
                                                    </a>                                                               
                                                    <a class='btn btn-sm btn-icon btn-danger deleteState' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' href='#' data-state-id='" . $id . "'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                                                <path d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M20.708 6.23975H3.75' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </td>";
                                            echo "</tr>";
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
        <!-- Footer Section Start -->
        <?php include('footer.php') ?>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->

    <!-- addcategory Modal Start -->
    <div id="addCategoryModal" class="modal addCategoryModal">
        <div class="modal-content">
            <h4 class="text-center fw-700 text-primary text-uppercase mb-2">Add Delivery Details</h4>
            <form method="POST" id='addState'>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="statename">State Name</label>
                            <input type="text" class="form-control" name="statename" id="statename" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="movalue">Minimum Order Value</label>
                            <input type="number" class="form-control" name="movalue" id="movalue" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="pcharge">Packing Charge</label>
                            <input type="number" class="form-control" name="pcharge" id="pcharge" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="req_type" id="req_type" value="add">
                <input type="submit" class="btn btn-primary w-100" name="addData" value="submit" />
            </form>
            <input id="closeAddModalBtn" type='button' class="close btn btn-danger mt-3" value="Close">
        </div>
    </div>
    <!-- addCategory Modal end -->

    <!-- editCategory Modal - start -->
    <div id="editCategoryModal" class="modal editCategoryModal">
        <div class="modal-content">
            <h4 class="text-center fw-700 text-primary text-uppercase mb-2">Edit State Details</h4>
            <form method="POST" id='editState'>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="statename">State Name</label>
                            <input type="text" class="form-control" name="statename" id="edit_statename" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="movalue">Minimum Order Value</label>
                            <input type="text" class="form-control" name="movalue" id="edit_movalue" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="pcharge">Packing Charge</label>
                            <input type="text" class="form-control" name="pcharge" id="edit_pcharge" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="state_id" id="state_id">
                <input type="hidden" name="req_type" id="req_type" value="edit">
                <input type="submit" class="btn btn-primary w-100" name="editData" value="update" />
            </form>
            <input id="closeEditModalBtn" type='button' class="close btn btn-danger mt-3" value="Close">
        </div>
    </div>
    <!-- editCategory Modal - end -->

    <!-- script - start -->
    <?php include('script.php') ?>
    <!-- script - end -->

    <script>

        // popup box
        function openPopup(modal) {
            modal.style.display = 'block';
        }
        function closePopup(modal) {
            modal.style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function () {
            var addCategoryBox = document.getElementById('addCategoryBox');

            var closeAddCategoryBox = document.getElementById('closeAddModalBtn');
            var closeEditCategoryBox = document.getElementById('closeEditModalBtn');

            var addCategoryModal = document.getElementById('addCategoryModal');
            var editCategoryModal = document.getElementById('editCategoryModal');

            if (addCategoryBox) {
                addCategoryBox.addEventListener('click', function () {
                    openPopup(addCategoryModal);
                });
            }

            closeAddCategoryBox.addEventListener('click', function () {
                closePopup(addCategoryModal);
            });

            closeEditCategoryBox.addEventListener('click', function () {
                closePopup(editCategoryModal);
            });

            window.addEventListener('click', function (event) {
                if (event.target === addCategoryModal || event.target === editCategoryModal) {
                    closePopup(event.target);
                }
            });
        });

        // add category - start
        $(document).ready(function () {
            $('#addState').submit(function (e) {
                e.preventDefault();
                // serialize form data
                var formData = $(this).serialize();
                // AJAX Request
                $.ajax({
                    type: 'POST',
                    url: 'deliverybackend.php',
                    data: formData,
                    success: function (response) {
                        if (response.trim() === "State added successfully!") {
                            console.log(response);
                            alert(response);
                            window.location.reload(true);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
        // add category - end

        // edit category - start
        $(document).on('click', '.editState', function () {
            var stateId = $(this).data('state-id');
            // Fetch category details using AJAX
            $.ajax({
                type: 'POST',
                url: 'deliverybackend.php',
                data: { req_type: 'get_state', state_id: stateId },
                dataType: 'json', // Expect JSON response
                success: function (response) {
                    if (response.success) {
                        // Populate the edit modal fields with the fetched data
                        $('#state_id').val(stateId);
                        $('#edit_statename').val(response.state.state);
                        $('#edit_movalue').val(response.state.minimum_order_value);
                        $('#edit_pcharge').val(response.state.packing_charge);
                        // Open the edit modal
                        openPopup(editCategoryModal);

                    } else {
                        console.log('Error fetching promocode data: ' + response.error);
                    }
                },
                error: function (error) {
                    console.log(1,error);
                }
            });
        });
        $('#editState').submit(function (e) {
            e.preventDefault();
            // Serialize form data
            var formData = $(this).serialize();
            // AJAX Request for updating the category
            $.ajax({
                type: 'POST',
                url: 'deliverybackend.php',
                data: formData,
                success: function (response) {
                    if (response.trim() === "State updated successfully!") {
                        console.log(response);
                        // Close the edit modal
                        $('#editCategoryModal').hide();
                        alert(response);
                        // Reload the page or update the category data in the UI as needed
                        window.location.reload(true);
                    } else {
                        console.log("Error updating state: " + response.trim());
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // edit category - end

        // delete state - start
        $(document).ready(function () {
            // Use event delegation for dynamically generated delete buttons
            $(document).on('click', '.deleteState', function (e) {
                e.preventDefault();
                var stateId = $(this).data('state-id');

                // Confirmation alertbox
                if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                        type: 'POST',
                        url: 'deliverybackend.php',
                        data: { req_type: 'delete', state_id: stateId },
                        success: function (response) {
                            console.log(response); // Log the response to the console
                            if (response.trim() === "State deleted successfully!") {
                                console.log("State deleted successfully");
                                alert(response);
                                window.location.reload(true);
                            } else {
                                console.log("Error deleting state: " + response.trim());
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
        // delete state end
        
    </script>

</body>

</html>