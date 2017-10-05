<?php
ob_start();
?>
<html>
<title>Welcome</title>
<head>
<link rel="stylesheet" href="css/newstyle.css"/>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>

       $(document).ready(function(){
		   $("#usrMsg").hide();
            $("#txtUsrName").blur(function(){
				if ($('#txtUsrName').val().length > 0) {
					$.post('frmValidate.php',{uname: $('#txtUsrName').val()}, function(data){
						if(data.exists){
							$("#usrMsg").show();
							$('#usrMsg').html("Username already exists");
						}else{
							$("#usrMsg").show();
							$('#usrMsg').html("Username available");
						}
					}, 'JSON');
				};				
            });
			
        });




</script>

</head>
<body>
<div>
    <img src="css/headerLogo.png" width="100%" height="30%" alt="image" />
</div>


