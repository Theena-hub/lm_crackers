<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
class SiteSettings
{
    function Update()
    {        
        extract($_REQUEST);
        global $conn;        
        $data = json_encode($_REQUEST);
        echo $data;        
        echo $query = "UPDATE tbl_sitesettings SET site_data = '$data' WHERE id='1'";             

        echo $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Data Updated Successfully!';
        } else {
            echo 'Error:' . $mysqli->error;
        }
    }
    function Fetch(){
        extract($_REQUEST);
        global $conn;
        $query = "SELECT * FROM tbl_sitesettings";                  
        $result = mysqli_query($conn, $query);
        if ($result) {
            $data = mysqli_fetch_assoc($result);            
            echo json_encode($data);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn), 'query' => $query]);
        }
    }
}

$func_type = new SiteSettings;

if ($_REQUEST['req_type'] == 'update') {
    $func_type->Update();
}elseif ($_REQUEST['req_type'] == 'fetch') {
    $func_type->Fetch();
}

?>