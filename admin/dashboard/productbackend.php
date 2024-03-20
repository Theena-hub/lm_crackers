<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');

class products
{
    function add()
    {
        extract($_REQUEST);
        global $conn;
        // Check if the image file has been uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];

            // Choose a directory to store the uploaded images
            $upload_directory = 'uploads/';

            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $image_name;
            if (move_uploaded_file($image_tmp_name, $target_path)) {
                // File moved successfully, now insert into the database
                $query = "INSERT INTO tbl_product (category, name, mrp, type,image,url) VALUES ('$category', '$name', '$mrp', '$type','$image_name','$url')";
                if (mysqli_query($conn, $query)) {
                    echo "Product Added Successfully!";
                } else {
                    echo "Error Adding Product: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving the uploaded image.";
            }
        } else {
            $query = "INSERT INTO tbl_product (category, name, mrp, type,url) VALUES ('$category', '$name', '$mrp', '$type','$url')";
            if (mysqli_query($conn, $query)) {
                echo "Product Added Successfully!";
            } else {
                echo "Error Adding Product: " . mysqli_error($conn);
            }
        }
        // Database insertion        
    }
    function get_product()
    {
        extract($_REQUEST);
        global $conn;
        // Validate and sanitize input
        $product_id = mysqli_real_escape_string($conn, $product_id);
        // Fetch product details from the database
        $query = "SELECT * FROM tbl_product WHERE id = '$product_id'";
        // Log the image path        
        $result = mysqli_query($conn, $query);

        if ($result) {
            $product = mysqli_fetch_assoc($result);
            // Return category details in JSON format
            echo json_encode(['success' => true, 'product' => $product]);
        } else {
            // Return an error message in JSON format
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    }
    function edit()
    {
        extract($_REQUEST);
        global $conn;

        // Check if the image file has been uploaded
        if (isset($_FILES['edit_image']) && $_FILES['edit_image']['error'] == UPLOAD_ERR_OK) {
            $edit_image_tmp_name = $_FILES['edit_image']['tmp_name'];
            $edit_image_name = $_FILES['edit_image']['name'];

            // Choose a directory to store the uploaded images
            $upload_directory = 'uploads/';

            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $edit_image_name;
            if (move_uploaded_file($edit_image_tmp_name, $target_path)) {
                // File moved successfully, now update the product information in the database
                $query = "UPDATE tbl_product SET name = '$name', mrp = '$mrp', category='$category', type='$type',url='$edit_url', image='$edit_image_name' WHERE id = '$product_id'";
                if (mysqli_query($conn, $query)) {
                    echo "Product updated successfully!";
                } else {
                    echo "Error updating product: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving the uploaded image.";
            }
        } else {
            // If no new image is uploaded, update the product information without changing the image
            $query = "UPDATE tbl_product SET name = '$name', mrp = '$mrp', category='$category', type='$type',url='$edit_url' WHERE id = '$product_id'";
            if (mysqli_query($conn, $query)) {
                echo "Product updated successfully!";
            } else {
                echo "Error updating product: " . mysqli_error($conn);
            }
        }

    }
    function delete()
    {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "DELETE FROM `tbl_product` WHERE id='$product_id'";
        if (mysqli_query($conn, $query)) {
            echo "Product Deleted Successfully!";
        } else {
            echo "Error Deleting Product: " . mysqli_error($conn);
        }
    }
}
$func_type = new products;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->delete();
} else if ($_REQUEST['req_type'] == 'get_product') {
    $func_type->get_product();
} else if ($_REQUEST['req_type'] == 'edit') {
    $func_type->edit();
}
?>