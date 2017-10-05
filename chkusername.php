<?php
require_once 'Connection.php';
    $objConn = new Connection();
    $conn = $objConn->connect();
    
    $username=$_POST['txtUsrName'];

    
    $result = mysqli_query($conn,"SELECT username FROM shine_user WHERE username='$username'");
    $num_rows = mysqli_num_rows($result);
	$conn->close();
	echo $num_rows;



?>