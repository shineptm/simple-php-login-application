<?php
session_start();
include 'header.php';
include 'UserController.php';



$username = "";
$rowValue = "";
$welcomemsg = "";

if (isset($_SESSION['login_user'])){
    $username = $_SESSION['login_user'];
    $usrObj = new UserController();
	
    $rowValue = $usrObj->getUserDetails($username);

	$welcomeMsg = "Please update your credentials if needed";
	
}else{
	header("location:login.php");
}


	if(!empty($_POST)){
	
	    $name = $_POST['txtName'];
		$usrname = $_POST['txtUsrName'];
		
		$usrObj = new UserController();
		$success = $usrObj->updateUser($rowValue->userid,$name,$usrname);
				 
		if($success == "Success"){
			header('Location:index.php?status=uS');                  
		}else{
			header('Location:index.php?status=uF');
			echo "Error while registering";
		}
		
	}


?>




<div class="headertop">

<ul>

  <li><b style="margin-left:160px; color:blue; font-family:sans-serif"><?php echo "Welcome  " . $rowValue->name . " !" ?></b></li>
  <li><a href="#Home">Home</a></li>
  <li><a href="#About Us">About Us</a></li>
  <li><a href="#Contact Us">Contact Us</a></li>
  <li><a href="logout.php">Log Out</a></li>
</ul>

</div>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" id="frmReg">
<table style="margin-left:160px" width="50%">
<tr>
<td align="center" colspan="2"><?php echo (isset($_SESSION['login_user'])) ? $welcomeMsg : "Welcome. Please login" ; ?> </td>
</tr>
<tr>
<td>Name :</td> 
<td><input type="text" value="<?php echo $rowValue->name; ?>" name="txtName" id="txtName" required="" /></td>
</tr>
<tr>
<td>Username :</td> 
<td><input type="text" value="<?php echo $rowValue->username; ?>" name="txtUsrName" id="txtUsrName" /></td>
</tr>
<tr>
<td> &nbsp </td>
<td><input type="submit" name="submit" value="UPDATE"  /></td>
<!--<input type="button" name="backbutton" value="CANCEL" onclick="window.location.href='index.php?session=D';"   /></td>-->
</tr>
</table>
</form>
<?php
include 'footer.php';
?>
		