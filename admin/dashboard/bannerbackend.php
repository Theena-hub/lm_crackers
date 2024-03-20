<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');

class Banner
{
    function Add()
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
                $query = "INSERT INTO tbl_banner (image) VALUES ('$image_name')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo 'Banner Added Successfully!';
                } else {
                    echo 'Error:' . $mysqli->error;   
                }
            } else {
                echo "Error moving the uploaded image.";
            }
        }
    }
    function Delete()
    {
        extract($_REQUEST);
        global $conn;
        $query = "UPDATE tbl_banner SET status = 0 WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Banner Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;   
        }
    }
    function Fetch()
    {
        extract($_REQUEST);
        global $conn;

        $query = "SELECT * FROM tbl_banner WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $data = mysqli_fetch_assoc($result);
            // Return category details in JSON format
            echo json_encode(['success' => true, 'data' => $data]);            
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn), 'query' => $query]);
        }
    }
    function Edit()
    {
        extract($_REQUEST);
        global $conn;

        // Check if the image file has been uploaded
        if (isset($_FILES['editimage']) && $_FILES['editimage']['error'] == UPLOAD_ERR_OK) {
            $edit_image_tmp_name = $_FILES['editimage']['tmp_name'];
            $edit_image_name = $_FILES['editimage']['name'];

            // Choose a directory to store the uploaded images
            $upload_directory = 'uploads/';

            // Move the uploaded image to the chosen directory
            $target_path = $upload_directory . $edit_image_name;
            if (move_uploaded_file($edit_image_tmp_name, $target_path)) {
                // File moved successfully, now update the product information in the database
                echo $query = "UPDATE tbl_banner SET image='$edit_image_name' WHERE id = '$editId'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo 'Banner Updated Successfully!';
                } else {
                    echo 'Error:' . $mysqli->error;   
                }
            } else {
                echo "Error moving the uploaded image.";
            }
        }
    }
}
$func_type = new Banner;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->Add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->Delete();
} else if ($_REQUEST['req_type'] == 'fetch') {
    $func_type->Fetch();
} else if ($_REQUEST['req_type'] == 'edit') {
    $func_type->Edit();
}
?>