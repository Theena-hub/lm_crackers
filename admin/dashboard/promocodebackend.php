<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include("db.php");

    function Add() {
        extract($_REQUEST);
        global $conn;
        // posted values
        $promocode = $_POST['promocode'];
        $discount = $_POST['discount'];
        // query
        $query = "INSERT INTO tbl_promocode (promocode, discount) VALUES ('$promocode', '$discount')";
        if (mysqli_query($conn, $query)) {
            echo "Promocode added successfully!";
        } else {
            echo "Error adding category: " . mysqli_error($conn);
        }
    }

    function Delete() {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "DELETE FROM tbl_promocode WHERE id = '$promocode_id' ";
        if (mysqli_query($conn, $query)) {
            echo "Promocode deleted successfully!";
        } else {
            echo "Error deleting category: " . mysqli_error($conn);
        }
    }

    switch ($_REQUEST['req_type']) {
        case 'add':
            Add();
            break;

        case 'delete':
            Delete();
            break;
    }
?>