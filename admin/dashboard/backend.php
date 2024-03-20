<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("db.php");
// class Category{
//     function __construct($name,$discount){
//         $this->name = $name;
//         $this->discount = $discount;   
//     }
// }
class categories
{
    function add()
    {
        extract($_REQUEST);
        global $conn;
        // posted values
        $categoryName = $_POST['name'];
        $discount = $_POST['discount'];
        // query
        $query = "INSERT INTO tbl_category (name, discount) VALUES ('$categoryName', '$discount')";

        if (mysqli_query($conn, $query)) {
            echo "Category added successfully!";
        } else {
            echo "Error adding category: " . mysqli_error($conn);
        }
    }
    function delete()
    {
        extract($_REQUEST);
        global $conn;
        // Make sure to use the correct column name in the WHERE clause
        $query = "DELETE FROM tbl_category WHERE id = '$category_id'";
        // $query = "UPDATE tbl_category SET status=0 WHERE id='$category_id' ";
        if (mysqli_query($conn, $query)) {
            echo "Category deleted successfully!";
        } else {
            echo "Error deleting category: " . mysqli_error($conn);
        }


    }
    function get_category()
    {
        extract($_POST);
        global $conn;
        // Validate and sanitize input
        $category_id = mysqli_real_escape_string($conn, $category_id);
        // Query to fetch category details
        $query = "SELECT * FROM tbl_category WHERE id = '$category_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $category = mysqli_fetch_assoc($result);
            // Return category details in JSON format
            echo json_encode(['success' => true, 'category' => $category]);
        } else {
            // Return an error message in JSON format
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    }
    function edit()
    {
        extract($_POST);
        global $conn;

        // Validate and sanitize input
        $category_id = mysqli_real_escape_string($conn, $category_id);
        $name = mysqli_real_escape_string($conn, $name);
        $discount = mysqli_real_escape_string($conn, $discount);

        // Query to update category details
        $query = "UPDATE tbl_category SET name = '$name', discount = '$discount' WHERE id = '$category_id'";

        if (mysqli_query($conn, $query)) {
            echo "Category updated successfully!";
        } else {
            echo "Error updating category: " . mysqli_error($conn);
        }
    }

    function update_alignment()
    {
        extract($_REQUEST);
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $alignmentValues = $_POST['alignment_values'];

            // Loop through the received alignment values and update the database
            foreach ($alignmentValues as $categoryId => $alignment) {
                $categoryId = mysqli_real_escape_string($conn, $categoryId);
                $alignment = mysqli_real_escape_string($conn, $alignment);

                $query = "UPDATE tbl_category SET alignment = '$alignment' WHERE id = '$categoryId'";

                if (mysqli_query($conn, $query)) {
                    echo "Alignment numbers updated successfully!";
                } else {
                    echo "Error updating alignment: " . mysqli_error($conn);
                }
            }
        }
    }

}
$func_type = new categories;
if ($_REQUEST['req_type'] == 'add') {
    $func_type->add();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->delete();
} else if ($_REQUEST['req_type'] == 'edit') {
    $func_type->edit();
} else if ($_REQUEST['req_type'] == 'update_alignment') {
    $func_type->update_alignment();
} else if ($_REQUEST['req_type'] == 'get_category') {
    $func_type->get_category();
}
?>