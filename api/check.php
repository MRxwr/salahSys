<?php 
require_once("../admin/includes/config.php");
require_once("../admin/includes/functions.php");
if( isset($_GET["date"]) && !empty($_GET["date"]) ){
    $date = $_GET["date"];
    if( $checkDate = selectDBNew("applications",[$date],"`testDate` LIKE ?","") ){
        if ( sizeof($checkDate) > 50 ){
            echo "false";
        }else{
            echo "true";
        }
    }else{
        echo "true";
    }
}
?>