<?php
/**
 * Created by Joemags.
 * User: joe
 * Date: 25/01/2017
 * Time: 13:06 PM
 */

session_start();
require_once('hawk/php/Optimizer.php');
$dbHelper = new Optimizer();
if(!isset($_SESSION['username'])){
    header('Location: index.html');
}else{
	$username = $_SESSION['username'];
}
