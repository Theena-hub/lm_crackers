<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include("db.php");

    function GetPrd() {
        global $conn;
        // query
        $query = "select * from tbl_product where status=1 group by name";
        $result = mysqli_query($conn, $query);
        $object = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($object ,$row);
            }
            echo json_encode(['success' => true, 'product' => $object]);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    }
    function Add() {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "INSERT INTO tbl_billing (name, bid, mobile, whatsapp, id_proof, date, address, payment, product_list, amount) VALUES ('$name', '$bid', '$mobile', '$whatsapp', '$idproof', '$date', '$address', '$mop', '$prdlist', '$amount')";
        if (mysqli_query($conn, $query)) {
            echo "Bill added successfully!";
        } else {
            echo "Error adding Bill: " . mysqli_error($conn);
        }
    }

    function Delete() {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "UPDATE tbl_billing SET status='0' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "Bill deleted successfully!";
        } else {
            echo "Error deleting Bill: " . mysqli_error($conn);
        }
    }

    function StatusChange() {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "UPDATE tbl_billing SET status='$status' WHERE id='$id'";
        if (mysqli_query($conn, $query)) {
            echo "Status Updated successfully!";
        } else {
            echo "Error Updating Status: " . mysqli_error($conn);
        }
    }

    function getOrderItems() {
        extract($_REQUEST);
        global $conn;
        // query
        $query = "SELECT * From tbl_orders WHERE order_id='$order_id'";
        $res = mysqli_query($conn, $query);
        $sno=0;
        foreach($res as $row){
        $sno++;
        echo $item_dtl = '<tr class="noitems item_"'.$sno.' >
            <td class="wbig">
                <input id="itemid_'.$sno.'" type="hidden" />
                <input id="listitems_'.$sno.'" class="listitems" type="text" placeholder="Search here ..." onblur="checkprd()" onfocus="closelist()" onkeyup="searchitem()" />
                <div class="itemlist_'.$sno.' itli"></div>
            </td>
            <td class="wnor"><input type="text" id="price_'.$sno.'" placeholder="0" value="" class="cr price" readonly></td>
            <td class="wnor"><input type="text" id="quantity_'.$sno.'" class="quantity" placeholder="0" oninput="calcQ()"></td>
            <td class="wnor"><input type="text" id="discount_'.$sno.'" placeholder="0" class="cr" readonly></td>
            <td class="wnor"><input type="text" id="dis_price_'.$sno.'" placeholder="0" class="cr" readonly></td>
            <td><input type="text" id="total_'.$sno.'" placeholder="0" class="cr b-0 total" readonly></td>
            <td>
                <a class="btn btn-sm btn-icon btn-warning" onclick="editItem()" data-item-id="edit_'.$sno.'" data-bs-toggle="tooltip" title="Edit" data-bs-placement="top">
                    <svg class="icon-20" data-item-id="edit_'.$sno.'" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
                <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" title="Delete" data-bs-placement="top" onclick="deleteItem()" data-item-id="del_'.$sno.'">
                    <svg class="icon-20" data-item-id="del_'.$sno.'" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                        <path d=M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </td>
            </tr>';
        }
    }

    switch ($_REQUEST['req_type']) {
        case 'getitem':
            GetPrd();
            break;

        case 'addbill':
            Add();
            break;

        case 'getOrderItems':
            getOrderItems();
            break;

        case 'delete':
            Delete();
            break;

        case 'status':
            StatusChange();
            break;
    }
?>