<?php
require_once 'Connection.php';

class UserController{
	
	
	
	public $uName;
	
        function getUName() {
            return $this->uName;
        }

        function setUName($uName) {
            $this->uName = $uName;
        }

        

function insertUser($name,$uname,$pwd){
	
$objConn = new Connection();
$conn = $objConn->connect();
$sql = "INSERT INTO shine_user(name,username,password)VALUES(?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $uname, $pwd);
$result = $stmt->execute();

	if($result){
		$success = "Success";
	}else{
		$success = "Failure";
	}

$stmt->close();
$conn->close();

return $success;

}

function updateUser($usrId, $name, $uname){
	
$objConn = new Connection();
$conn = $objConn->connect();
$sql = "UPDATE shine_user SET name = ? , username = ? WHERE userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssd", $name, $uname, $usrId);
$result = $stmt->execute();

	if($result){
		$success = "Success";
	}else{
		$success = "Failure";
	}

$stmt->close();
$conn->close();

return $success;

}

function getUserDetails($userName){
	

$objConn = new Connection();
$conn = $objConn->connect();
$sql = "SELECT userid,name,username,password FROM shine_user WHERE username = '$userName'";
$result = $conn->query($sql);

    try{
		if($result){
			$value = mysqli_fetch_object($result);
		}
    }catch(Exception $ex) {}

$conn->close();
  
return $value;

}

function checkUserExist($userName){	

$objConn = new Connection();
$conn = $objConn->connect();
$sql = "SELECT * FROM shine_user WHERE username = '$userName'";
$result=$conn->query($sql);
$row_cnt = mysqli_num_rows($result);
	if($row_cnt > 0){
		$res = true;
	}else{
		$res = false;
	}
$conn->close();
$result->close();

return $res;

}

}




?>