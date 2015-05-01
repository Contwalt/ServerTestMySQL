<?php

/*
* Following code reads single row from table.
* Identified by username.
*/

// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// check for post data
if (isset($_GET["User"])) {
    $username = $_GET['User'];
 
    // get a pair from Test table
    $result = mysql_query("SELECT *FROM Login WHERE User = $User");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $pair = array();
            $pair["User"] = $result["User"];
            $pair["Pwd"] = $result["Pwd"];
			
            // success
            $response["success"] = 1;
 
            // user node
            $response["pair"] = array();
 
            array_push($response["pair"], $pair);
 
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no pair found
            $response["success"] = 0;
            $response["message"] = "No pair found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no pair found
        $response["success"] = 0;
        $response["message"] = "No pair found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
