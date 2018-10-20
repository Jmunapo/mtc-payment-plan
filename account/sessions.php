<?php
/**
 * Created by Joemags.
 * User: joe
 * Date: 25/01/2017
 * Time: 13:06 PM
 */

//include('../config.php');
session_start();
$currLoc = basename($_SERVER['PHP_SELF']);
require_once("../php/hawk/Optimizer.php");
$dbHelper = new Optimizer();

if(!isset($_SESSION['role']) && $currLoc !== "login.php"){
    header("refresh:0 url=../");
    exit(0);
}else if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
    $username = $_SESSION[$role];
    //Redirect to home if we're on login
    if($currLoc == "login.php"){
        If($role == "admin"){
            header('Location: ../admin/index.php');
            exit(0);
        }
        header('Location: ../index.php');
    }
}else{

}
