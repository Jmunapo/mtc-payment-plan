<?php


if(isset($_POST['inputValue']))
{
	$phone=$_POST['phone_number'];
	/*
	$data=$db->getDetails('personal','phone', $username);
	$reg_number=$data[0]['username'];
	$data2=$db->getDetails('applicants','reg_number', $username);
	$plan_span=$data[0]['plan_span'];*/


// suppress error message
    error_reporting(0);

    // BulkSMS Webservice username for sending SMS.
    //Get it from User Configuration. Its case sensitive.

    $username = 'youngkunjez';

    // Webservices token for above Webservice username
    $token = '24ec935f60593ca19330eb597309511d';

    // BulkSMS Webservices URL
    $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';

    // destination numbers, comma seperated or use #groupcode for sending to group
    // $destinations = '#devteam,263071077072,26370229338';
    // $destinations = '26300123123123,26300456456456';  for multiple recipients
    $destinations = $phone;

    // SMS Message to send
	$message =$_POST['inputValue'];

    // send via BulkSMS HTTP API

    $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
    $ws_str .= '&to=' . urlencode($destinations) . '&msg='.urlencode($message);
    $ws_response = @file_get_contents($ws_str);





    //run sql queries here

}

    ?>


{
	 <?php echo $message; ?>




}