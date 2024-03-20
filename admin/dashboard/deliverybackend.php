<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include("db.php");

    function GetState(){
        extract($_REQUEST);
        global $conn;
        // Query to fetch state details
        $query = "SELECT * FROM tbl_state WHERE id = '$state_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $state = mysqli_fetch_assoc($result);
            // Return state details in JSON format
            echo json_encode(['success' => true, 'state' => $state]);
        } else {
            // Return an error message in JSON format
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    }

    function Add(){
        extract($_REQUEST);
        global $conn;
        // query
        $query = "INSERT INTO tbl_state (state, minimum_order_value, packing_charge) VALUES ('$statename', '$movalue', '$pcharge')";
        if (mysqli_query($conn, $query)) {
            echo "State added successfully!";
        } else {
            echo "Error adding category: " . mysqli_error($conn);
        }
    }

    function Delete() {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "DELETE FROM tbl_state WHERE id = '$state_id' ";
        if (mysqli_query($conn, $query)) {
            echo "State deleted successfully!";
        } else {
            echo "Error deleting state: " . mysqli_error($conn);
        }
    }

    function Edit(){
        extract($_REQUEST);
        global $conn;

        // Query to update category details
        $query = "UPDATE tbl_state SET state = '$statename', minimum_order_value = '$movalue', packing_charge = '$pcharge' WHERE id = '$state_id'";

        if (mysqli_query($conn, $query)) {
            echo "State updated successfully!";
        } else {
            echo "Error updating state: " . mysqli_error($conn);
        }
    }

    switch ($_REQUEST['req_type']) {
        case 'add':
            Add();
            break;

        case 'delete':
            Delete();
            break;

        case 'get_state':
            GetState();
            break;

        case 'edit':
            Edit();
            break;
    }
?>