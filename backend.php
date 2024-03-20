<?php
    include('admin/dashboard/db.php');
    function CheckCode(){
        extract($_REQUEST);
        global $conn;
        // query
        $query = "select * from tbl_promocode where promocode='$promocode' and  status=1";
        $result =  mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            echo $row['discount'];
        } else {
            echo "No Discount";
        }
    }
    
    if ($_REQUEST['req_type'] == 'checkCode') {
        CheckCode();
    }
?>