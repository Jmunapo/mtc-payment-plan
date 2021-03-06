<?php
session_start();
require_once("../hawk/DBHelper.php");
 $db = new DBHelper();
 $username =$_SESSION['admin'] ;
 $admin    =$db->getDetails('admin_login','username',$username);
 $post     =$admin[0]['post'];
 $message = "";
 $msgtype = "";

    if(isset($_POST['type'])){

        $msgtype = $_POST['type'];
        switch ($msgtype) {
            case 'default':
            $message = "You defaulted your plan ,please make a payment to avoid being defered from your studies";
                break;
        
            case 'approve':
            $message = "You $span month/s plan has been approved";
                break;

            case 'active':
            $message = "You active plan is about to be due";
                break;
            
            default:
                $message = "";
                break;
        }
    }
   if(isset($_POST['message'])) {

        $message = $_POST['message'];

    }

    if($message == ""){ ?>
        {
            "error" : "No message"
        }
        <?php exit(0);
    }

    $key = (isset($_POST['phone']))? "phone" : "reg";
    $val = htmlentities($_POST[$key]);
    $key = ($key == "reg")? "reg_number" : $key;

    $personalDetails = $db->getDetails('personal', $key, $val);
    $reg_number = $personalDetails[0]['reg_number'];
    $phone = $personalDetails[0]['phone'];
    $plan       = $db->getDetails('applicants','reg_number',$reg_number);
    $span       = $plan[0]['plan_span'];

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
    //$destinations = $phone;

    // send via BulkSMS HTTP API

    $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
    $ws_str .= '&to=0' . urlencode($phone) . '&msg='.urlencode($message);
    $ws_response = @file_get_contents($ws_str);

    //run sql queries here
    $date         = date("Y-m-d");
    $notice = array('notices',
        $date,
        $reg_number,
        $post,
        $message
    );

    $entered = $db->insertData($notice);

    if($msgtype == "approve"){

        $updatestatus = $db->updateData('applicants','status', 'approved', 'reg_number', $reg_number);
    }
   

    if($entered){ ?>
        {
            "success" : "message sent!"
        }
    <?php } ?>

