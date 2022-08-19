<?php

require_once ("Osotech.php");
$output ="";
$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] !="") {
        if ($_POST['action'] ==="check_portal_status") {
            // collect all the form info...
            $output = $Osotech->check_user_activity_allowed("maintenance_mode");
            if ($output) {
                echo $output;
            }

        }
    }
}