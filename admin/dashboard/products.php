<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
?>
<!doctype html>
<html lang="en" dir="ltr">
<?php include('head.php') ?>

<body class="  ">
    <!-- loader Start -->
    <?php include('loader.php') ?>
    <!-- loader END -->
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
                                    <h1>Hello Devs!</h1>
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
                    <img src="../assets/images/dashboard/top-header1.png" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header2.png" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header3.png" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header4.png" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="../assets/images/dashboard/top-header5.png" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h3 class="card-title text-dark">Product List</h3>
                            </div>
                            <button type="button" id="addProductBox" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                Add Product
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php include('productstable.php') ?>
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
    <!-- addproduct Modal Start -->
    <div id="addProductModal" class="modal addProductModal">
        <div class="modal-content">
            <h4 class="text-center fw-700 text-primary text-uppercase mb-2">Add Product</h4>
            <form method="POST" id='addProduct' enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="category">Product Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">select</option>
                                <?php
                                // Fetch categories from the database
                                $query = "SELECT * FROM tbl_category";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    // Loop through categories and populate the dropdown
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='{$row['name']}'>{$row['name']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Error fetching categories</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Product Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="mrp">Product MRP</label>
                            <input type="text" class="form-control" name="mrp" id="mrp" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="type">Type</label>
                            <input type="text" class="form-control" name="type" id="type" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="url">Video</label>
                            <input type="text" class="form-control" name="url" id="url" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Product Image</label>
                            <input type="file" class="form-control" name="image" id="image"
                                onchange="previewImage(this)" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <img id="imagePreview" src="#" alt="Preview"
                                style="display: none; max-width: 100px; margin-top: 10px;">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="req_type" id="req_type" value="add">
                <input type="submit" class="btn btn-primary w-100" name="addData" value="Submit" />
            </form>
            <input id="closeAddModalBtn" type='button' class="close btn btn-danger mt-3" value="Close">
        </div>
    </div>
    <!-- addProduct Modal end -->
    <!-- editproduct Modal Start -->
    <div id="editProductModal" class="modal editProductModal">
        <div class="modal-content">
            <h4 class="text-center fw-700 text-primary text-uppercase mb-2">Edit Product</h4>
            <form method="POST" id='editProduct'>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="category">Product Category</label>
                            <select name="category" id="edit_category" class="form-control" required>
                                <option value="">select</option>
                                <?php
                                // Fetch categories from the database
                                $query = "SELECT * FROM tbl_category";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    // Loop through categories and populate the dropdown
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='{$row['name']}'>{$row['name']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Error fetching categories</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Product Name</label>
                            <input id="edit_name" type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="mrp">Product MRP</label>
                            <input id="edit_mrp" type="text" class="form-control" name="mrp" id="mrp" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="type">Product Type</label>
                            <input id="edit_type" type="text" class="form-control" name="type" id="type" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="edit_url">Video URL</label>
                            <input type="text" class="form-control" name="edit_url" id="edit_url" >                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="edit_image">Product Image</label>
                            <input type="file" class="form-control" name="edit_image" id="edit_image" accept="image/*"
                                onchange="previewImage(this)">                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">                           
                            <img id="edit_image_preview" src="" alt="Product Image"
                                style="max-width: 100px; max-height: 100px; display: none;">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="product_id" id="product_id">
                <input type="hidden" name="req_type" id="req_type" value="edit">
                <input type="submit" class="btn btn-primary w-100" name="editData" value="Update" />
            </form>
            <input id="closeEditModalBtn" type='button' class="close btn btn-danger mt-3" value="Cancel">
        </div>
    </div>
    <!-- editProduct Modal end -->
    <!-- scirpt - start -->
    <?php include('script.php') ?>
    <!-- scirpt - end -->
    <script>
        $(document).ready(function () {
            $('#edit_image').change(function () {
                // Handle image preview for the edit form
                var input = this;
                var preview = $('#edit_image_preview')[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            });
        });
        function previewImage(input) {
            var preview = document.getElementById('edit_image_preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        // add product - start
        $(document).ready(function () {
            $('#addProduct').submit(function (e) {
                e.preventDefault();
                // var formData = $(this).serialize();
                var formData = new FormData(this);
                console.log(formData);

                var imageInput = $('#image')[0].files[0];
                formData.append('image', imageInput);
                console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: 'productbackend.php',
                    data: formData,
                    contentType: false,
                    processData: false,  // Important: Don't process the data (requires FormData)
                    success: function (response) {
                        console.log(response);  // Log the response to the console
                        if (response.trim() === "Product Added Successfully!") {
                            alert(response);
                            // closeModal();
                            // $('#datatable').load('productstable.php');
                            window.location.href = 'products.php';
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
        // add product - end
        // edit product - start               
        $(document).on('click', '.editProductBtn', function (e) {
            var productId = $(this).data('product-id');
            console.log(productId);
            // Fetch product details using AJAX
            $.ajax({
                type: "POST",
                url: 'productbackend.php',
                data: { req_type: 'get_product', product_id: productId },
                dataType: 'json', // Expect JSON response
                success: function (response) {
                    console.log(response);
                    // Parse the JSON response
                    // var productDetails = JSON.parse(response);
                    // console.log(productDetails);

                    // Check if data is successfully retrieved                    
                    if (response.success) {
                        // Populate the edit modal fields with the fetched data
                        $('#product_id').val(productId);
                        $('#edit_category').val(response.product.category);
                        $('#edit_name').val(response.product.name);
                        $('#edit_mrp').val(response.product.mrp);
                        $('#edit_type').val(response.product.type);
                        $('#edit_url').val(response.product.url);

                        var imagePath = response.product.image;
                        console.log(imagePath);

                        // Set the image source in the edit product modal
                        $('#edit_image_preview').attr('src', 'uploads/'+imagePath);
                        $('#edit_image_preview').css('display', 'block');

                        // Open the edit modal
                        // openPopup(editProductModal);
                    } else {
                        console.log('Error fetching product data: ' + response.error);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        $('#editProduct').submit(function (e) {
            e.preventDefault();
            // Create a FormData object to handle file uploads
            var formData = new FormData(this);
            // AJAX Request for updating the category
            $.ajax({
                type: 'POST',
                url: 'productbackend.php',
                data: formData,
                processData: false,  // Important: tell jQuery not to process the data
                contentType: false,  // Important: tell jQuery not to set contentType        
                success: function (response) {
                    if (response.trim() === "Product updated successfully!") {
                        console.log(response);
                        // Close the edit modal
                        $('#editProductModal').hide();
                        alert(response);
                        // Reload the page or update the category data in the UI as needed
                        window.location.href = 'products.php';

                    } else {
                        console.log("Error updating product: " + response.trim());
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // edit product - end
        // delete product - start
        $(document).ready(function () {
            $(document).on('click', '.deleteProduct', function (e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                var tr = $(this).closest('tr');
                // alertbox
                if (confirm("Are You Sure You Want to Delete this Product?")) {
                    $.ajax({
                        type: "POST",
                        url: 'productbackend.php',
                        data: { req_type: 'delete', product_id: productId },
                        success: function (response) {
                            console.log(response);
                            if (response.trim() === "Product Deleted Successfully") {
                                console.log("Product Deleted Successfully");
                            } else {
                                console.log('Error Deleting Product:' + response.trim());
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                } window.location.href = 'products.php';
            });
        });
        // delete product - end
        // image preview - start
        function previewImage(input) {
            // getting image with id
            var preview = document.getElementById('imagePreview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
        // image preview - end
        // popup box 
        document.addEventListener('DOMContentLoaded', function () {
            var addProductBox = document.getElementById('addProductBox');
            var editProductBox = document.getElementById('editProductBox');

            var closeAddProductBox = document.getElementById('closeAddModalBtn');
            var closeEditProductBox = document.getElementById('closeEditModalBtn');

            var addProductModal = document.getElementById('addProductModal');
            var editProductModal = document.getElementById('editProductModal');

            function openPopup(modal) {
                modal.style.display = 'block';
            }

            function closePopup(modal) {
                modal.style.display = 'none';
            }

            if (addProductBox) {
                addProductBox.addEventListener('click', function () {
                    openPopup(addProductModal);
                });
            }

            if (editProductBox) {
                editProductBox.addEventListener('click', function () {
                    openPopup(editProductModal);
                });
            }

            closeAddProductBox.addEventListener('click', function () {
                closePopup(addProductModal);
            });

            closeEditProductBox.addEventListener('click', function () {
                closePopup(editProductModal);
            });

            window.addEventListener('click', function (event) {
                if (event.target === addProductModal || event.target === editProductModal) {
                    closePopup(event.target);
                }
            });
        });
        // popup box - end
    </script>
</body>

</html>