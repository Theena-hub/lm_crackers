<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
// Fetch categories from the database
$query = "SELECT * FROM tbl_category";
$result = mysqli_query($conn, $query);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                                <h4 class="card-title text-dark">Category List</h4>
                            </div>
                            <button type="button" id="addCategoryBox" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                Add Category
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped" role="grid"
                                    data-bs-toggle="data-table">
                                    <thead>
                                        <tr class="ligth">
                                            <th>S.No</th>
                                            <th>Category Name</th>
                                            <th>Discount</th>
                                            <th>Action</th>
                                            <th>Alignment</th>
                                            <th>Change Alignment</th>
                                        </tr>
                                    </thead>
                                    <tbody id='record'>
                                        <?php
                                        $serialNumber = 1;
                                        foreach ($categories as $category) {
                                            $id = $category['id'];
                                            echo "<tr>";
                                            echo "<td>" . $serialNumber++ . "</td>";
                                            echo "<td>" . $category['name'] . "</td>";
                                            echo "<td>" . $category['discount'] . "</td>";

                                            echo "<td>                                                                
                                                    <input type='hidden' name='req_type' id='req_type' value='get_category'/>
                                                    <a class='btn btn-sm btn-icon btn-warning editCategoryBtn' data-bs-toggle='modal' data-bs-target='#editCategoryModal' data-category-id='" . $category['id'] . "'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                                <path d='M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path fill-rule='evenodd' clip-rule='evenodd' d='M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M15.1655 4.60254L19.7315 9.16854' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            </svg>
                                                        </span>
                                                        EDIT
                                                    </a>                                                      
                                    
                                                    <a class='btn btn-sm btn-icon btn-danger deleteCategory' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' href='#' data-category-id='" . $category['id'] . "'>
                                                        <span class='btn-inner'>
                                                            <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                                                <path d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M20.708 6.23975H3.75' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                                <path d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                                            </svg>
                                                        </span>
                                                        DELETE
                                                    </a>
                                                  </td>";
                                            echo "<td>" . $category['alignment'] . "</td>";
                                            echo "<td style='width:10px'><input type='text' id='cat_$id'  value='" . $category['alignment'] . "' onchange='store($id)' class='form-control alignment-value' required /></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <input type="button" class="btn alignment-submit d-flex bg-success text-white"
                                    style="margin-left: auto;" value='Alignment Submit'>
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
            <h4 class="text-center fw-700 text-primary text-uppercase mb-2">Add Category</h4>
            <form method="POST" id='addCategory'>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="name">Category Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="discount">Discount</label>
                            <input type="text" class="form-control" name="discount" id="discount" required>
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="availability">Available</label>
                            <input type="checkbox" class="form-check-input" name="availability" id="availability"
                                value="1">
                        </div>
                    </div> -->
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
            <h4 class="text-center fw-700 text-primary text-uppercase mb-2">Edit Category</h4>
            <form method="POST" id='editCategory'>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="name">Category Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="discount">Discount</label>
                            <input type="text" class="form-control" name="discount" id="edit_discount">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="category_id" id="category_id">
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
        // category alignment script
        var dataLength = $('#record tr').length;
        let obj = {};
        var enteredValues = new Set();

        $('.alignment-value').on('keyup', function () {
            // Get the value entered in the input box
            var inputValue = $(this).val();
            if (inputValue === '') {
                alert('Alignment value cannot be empty.');
                $(this).val(''); // Clear the input field
            }
            else if (inputValue > dataLength) {
                alert('please enter the below value of table row');
                $(this).val(''); // Clear the input field
            } else if (inputValue <= 0) {
                alert('Alignment value must be greater than 0.');
                $(this).val(''); // Clear the input field
            } else if (enteredValues.has(inputValue)) {
                alert('This value is already entered in another input box.');
                $(this).val(''); // Clear the input field
            }
        });

        const store = (id) => {
            enteredValues.clear();
            const key = "cat_" + id;
            const value = $("#cat_" + id).val();
            obj = { ...obj, [key]: value };
            const val = Object.values(obj);
            val.map((item) => enteredValues.add(item));
        }

        // alignmentvalue - start (AJAX call)
        $(document).ready(function () {
            $('.alignment-submit').click(function () {
                // Extract alignment values from the enteredValues set
                var alignmentValues = {};
                var valid = true;
                $('.alignment-value').each(function () {
                    var categoryId = $(this).attr('id').replace('cat_', '');
                    var alignment = $(this).val();
                    // Validate that alignment is a non-zero value
                    if (!alignment || isNaN(alignment) || alignment == 0) {
                        alert('Please enter a valid non-zero alignment value for category ' + categoryId);
                        valid = false;
                        return false; // Exit the loop
                    }
                    alignmentValues[categoryId] = alignment;
                });
                if (valid) {
                    $.ajax({
                        type: 'POST',
                        url: 'backend.php',
                        data: { req_type: 'update_alignment', alignment_values: alignmentValues },
                        success: function (response) {
                            console.log(response);
                            window.location.href = 'category.php';
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
        // add category - start
        $(document).ready(function () {
            $('#addCategory').submit(function (e) {
                e.preventDefault();
                // serialize form data
                var formData = $(this).serialize();
                // AJAX Request
                $.ajax({
                    type: 'POST',
                    url: 'backend.php',
                    data: formData,
                    success: function (response) {
                        if (response.trim() === "Category added successfully!") {
                            console.log(response);
                            alert(response);
                            // $('#addCategoryModal').hide();
                            window.location.href = 'category.php';
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
        $(document).on('click', '.editCategoryBtn', function () {
            var categoryId = $(this).data('category-id');
            // Fetch category details using AJAX
            $.ajax({
                type: 'POST',
                url: 'backend.php',
                data: { req_type: 'get_category', category_id: categoryId },
                dataType: 'json', // Expect JSON response
                success: function (response) {
                    // Check if data is successfully retrieved
                    if (response.success) {
                        // Populate the edit modal fields with the fetched data
                        $('#category_id').val(categoryId);
                        $('#edit_name').val(response.category.name);
                        $('#edit_discount').val(response.category.discount);
                        // Open the edit modal
                        openPopup(editCategoryModal);

                    } else {
                        console.log('Error fetching category data: ' + response.error);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        $('#editCategory').submit(function (e) {
            e.preventDefault();
            // Serialize form data
            var formData = $(this).serialize();
            // AJAX Request for updating the category
            $.ajax({
                type: 'POST',
                url: 'backend.php',
                data: formData,
                success: function (response) {
                    if (response.trim() === "Category updated successfully!") {
                        console.log(response);
                        // Close the edit modal
                        $('#editCategoryModal').hide();
                        alert(response);
                        // Reload the page or update the category data in the UI as needed
                        window.location.href = 'category.php';

                    } else {
                        console.log("Error updating category: " + response.trim());
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // edit category - end

        // delete category - start
        $(document).ready(function () {
            // Use event delegation for dynamically generated delete buttons
            $(document).on('click', '.deleteCategory', function (e) {
                e.preventDefault();
                console.log('buttonclicked');
                var categoryId = $(this).data('category-id');
                var tr = $(this).closest('tr'); // Get the closest <tr> element for later removal

                // Confirmation alertbox
                if (confirm("Are you sure you want to delete this category?")) {
                    $.ajax({
                        type: 'POST',
                        url: 'backend.php',
                        data: { req_type: 'delete', category_id: categoryId },
                        success: function (response) {
                            console.log(response); // Log the response to the console
                            if (response.trim() === "Category deleted successfully!") {
                                console.log("Category deleted successfully");
                                alert(response);
                                // tr.fadeOut('slow', function () {
                                //     $(this).remove(); // Remove the row from the table on successful deletion
                                // });
                                window.location.href = 'category.php';
                            } else {
                                console.log("Error deleting category: " + response.trim());
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
        // delete category end
        // popup box 
        document.addEventListener('DOMContentLoaded', function () {
            var addCategoryBox = document.getElementById('addCategoryBox');
            var editCategoryBox = document.getElementById('editCategoryBox');

            var closeAddCategoryBox = document.getElementById('closeAddModalBtn');
            var closeEditCategoryBox = document.getElementById('closeEditModalBtn');

            var addCategoryModal = document.getElementById('addCategoryModal');
            var editCategoryModal = document.getElementById('editCategoryModal');

            function openPopup(modal) {
                modal.style.display = 'block';
            }

            function closePopup(modal) {
                modal.style.display = 'none';
            }

            if (addCategoryBox) {
                addCategoryBox.addEventListener('click', function () {
                    openPopup(addCategoryModal);
                });
            }

            if (editCategoryBox) {
                editCategoryBox.addEventListener('click', function () {
                    openPopup(editCategoryModal);
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

        // validations for discount field
        function validateDiscountInput(input) {
            // Use a regular expression to match only two digits
            var value = input.value.replace(/[^0-9]/g, '').substring(0, 2);
            // Update the input value
            input.value = value;
        }
        $(document).on('input', '#discount', function () {
            validateDiscountInput(this);
        });

        $(document).on('input', '#edit_discount', function () {
            validateDiscountInput(this);
        });

    </script>

</body>

</html>