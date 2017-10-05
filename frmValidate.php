<?php
header('content-type: text/json');

if(isset($_POST['uname'])){
	
    $usrName = $_POST['uname'];
    include 'UserController.php';
    $usrObj = new UserController();
    $rowExist = $usrObj->checkUserExist($usrName);

echo json_encode(array('exists' => $rowExist));

}




?>