<?php
// $conn = mysqli_connect("localhost","u342669607_lmcrackers","2pE^7JmE&","u342669607_lmcrackers");
$conn = mysqli_connect("localhost", "root", "", "lmcrackers");

date_default_timezone_set("Asia/Kolkata");
if (!$conn) {
    echo "not connected database";
}
$query = "SELECT * FROM tbl_sitesettings";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$site_data = json_decode($data['site_data'], true);

// site details
$site_name = $site_data['site_name'];
$site_discount = $site_data['site_discount'];
$billing_discount = $site_data['billing_discount'];
$site_whatsapp_number = $site_data['whatsapp_number'];
$site_mobile_number = $site_data['mobile_number'];
$site_email = $site_data['email'];
$site_googlemap_location_url = $site_data['googlemap_location_url'];
$site_minimum_order = $site_data['site_minimum_order'];
$site_address = $site_data['address'];
$site_googlepay_number = $site_data['googlepay_number'];
$site_phonepay_number = $site_data['phonepay_number'];
// bank one details
$bank_name_one = $site_data['bank_name_one'];
$account_holder_name_one = $site_data['account_holder_name_one'];
$account_number_one = $site_data['account_number_one'];
$ifsc_code_one = $site_data['ifsc_code_one'];
$branch_one = $site_data['branch_one'];
// bank two details
$bank_name_two = $site_data['bank_name_two'];
$account_holder_name_two = $site_data['account_holder_name_two'];
$account_number_two = $site_data['account_number_two'];
$ifsc_code_two = $site_data['ifsc_code_two'];
$branch_two = $site_data['branch_two'];
?>