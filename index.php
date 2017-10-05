<?php
include 'header.php';
require_once 'Connection.php';
$status = "";

if(isset($_GET['status'])) {
    $status = $_GET['status'];
    if($status == 'S'){
        echo "<html><center style='color:red;'>You have registered successfully. Please login with your credentials</center></html>";
    }  
	elseif($status == 'uS'){
        echo "<html><center style='color:red;'>You have successfully updated your details. <br> Please login with new credentials</center></html>";
    }elseif($status == 'uF'){
		echo "<html><center style='color:red;'>Updation failed. Please try again</center></html>";
	}
	
	
	
}


    if (isset($_POST['submit'])){     

    $objConn = new Connection();
    $conn = $objConn->connect();
    
    $username=$_POST['txtUsrName'];
    $password=$_POST['txtPwd'];
    
    $result = mysqli_query($conn,"SELECT username FROM shine_user WHERE username='$username' and password='$password'");
    $num_rows = mysqli_num_rows($result);
	
	$conn->close();
	
      if($num_rows > 0){
          session_start();
          $_SESSION['login_user']=$username; 
       	  header('Location:home.php');     
      }else{
            echo "You have not registered yet. Please register as a new member";
     }
      
    }

?>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" id="frmReg">
<table style="margin-left:150px" width="70%">
<tr>
<td align="center" colspan="2">Please Login </td>
</tr>
</br>
<tr>
<td>Username :</td> 
<td><input type="text" name="txtUsrName" id="txtUsrName" required="" /></td>
</tr>
<tr>
<td>Password :</td>
<td><input type="password" name="txtPwd" id="txtPwd" required="" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="LOGIN"/>
<a href="register.php">New Member</a>
</td>
</tr>
</table>
</form>
<?php
include 'footer.php';
?>