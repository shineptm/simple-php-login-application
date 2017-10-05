<?php
include 'header.php';
include 'UserController.php';


//if (isset($_POST['submit']))
	if(!empty($_POST)){
	
	    $name = $_POST['txtName'];
		$usrname = $_POST['txtUsrName'];
		$password = $_POST['txtPwd'];
		$usrObj = new UserController();
		$success = $usrObj->insertUser($name,$usrname,$password);
				
		if($success == "Success"){
			header("Location:index.php?status=S");	               
		}else{
			echo "Error while registering";
		}
		
	}
	
?>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" id="frmReg">
<table style="margin-left:150px" width="70%">
<tr>
<td align="center" colspan="2"> Register Details</td>
</tr>
<br>
<tr>
<td>Name :</td> 
<td><input type="text" name="txtName" id="txtName" required="" /></td>
</tr>
<tr>
<td>Username :</td> 
<td><input type="text" name="txtUsrName" id="txtUsrName" required="" />
<span id="usrMsg" class="msgDisplay" style="color:red">&nbsp;</span></td>
</tr>
<tr>
<td>Password :</td>
<td><input type="password" name="txtPwd" id="txtPwd" required="" /></td>
</tr>
<tr>
<td> &nbsp </td>
<td><input type="submit" name="submit" value="REGISTER"  />
&nbsp; <input type="button" name="bckButton" value="BACK" onclick="window.location.href='index.php';"  /></td>
</tr>
</table>
</form>
<?php
include 'footer.php';
?>
