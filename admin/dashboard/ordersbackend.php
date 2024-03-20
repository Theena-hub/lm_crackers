<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("db.php");

class Orders
{
    function Fetch()
    {
        extract($_REQUEST);
        global $conn;
        
        $query = "SELECT * FROM tbl_orders WHERE order_id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $data = mysqli_fetch_assoc($result);
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn), 'query' => $query]);
        }
    }
    function Update()
    {
        extract($_REQUEST);
        global $conn;
        $query = "UPDATE tbl_orders SET order_status='$status' WHERE order_id='$editId'";
        // Perform the database update
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Updated Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
    function Delete(){
        extract($_REQUEST);
        global $conn;        
        $query = "UPDATE tbl_orders SET status = 0 WHERE order_id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Deleted Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
}

$func_type = new Orders;

if ($_REQUEST['req_type'] == 'update-order-status') {
    $func_type->Update();
} else if ($_REQUEST['req_type'] == 'fetch') {
    $func_type->Fetch();
} else if ($_REQUEST['req_type'] == 'delete') {
    $func_type->Delete();
}
?>