<?php 

/*
* The following code creates a new item pair: username and password.
* All details are read from an HTTP Post Request.  This does not
* handle the saving of an image.
*/

//First, we create an array for the JSON response
$response = array();

if(isset($_POST['User']) && isset($_POST['Pwd'])) {
	$username = $_POST['User'];
	$password = $_POST['Pwd'];
	
	// include db connector class
	require_once __DIR__ . '/db_connect.php';
	
	// connect to the db
	$db = new DB_CONNECT();
	
	// mysql insert new row into pair table
	$result = mysql_query("INSERT INTO Login(User, Pwd) VALUES('$User', '$Pwd')");
	
	if ($result) {
		// successfully added row
		$response["success"] = 1;
		$response["message"] = "User/pwd pair successfully added.";
		
	} else {
		// failed to insert
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";
	}
	// echo back response (JSON)
	echo json_encode($response);
} else {
	// required field missing
	$response["success"] = 0;
	$response["message"] = "Required field(s) missing";
	
	// echo back JSON response
	echo json_encode($response);
}
?>