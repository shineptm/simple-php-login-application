<?php

class Connection{
	
	
	protected $db_name = 'internship';
	protected $db_user = 'internship';
	protected $db_pass = 'internship';
	protected $db_host = 'localhost';
	
	
	/*
    protected $db_name = 'shine_db';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = 'localhost';
	*/

	public function connect() {
	
		$connect_db = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
				
		if ( mysqli_connect_errno() ){
			printf("Connection failed: %s\ ", mysqli_connect_error());
			exit();
		}
		
		return $connect_db;
		
	}

	
	



	
	
	
	
	
	
	
	
}	
	
	
	
	
/*

CREATE TABLE shine_user(
userid int AUTO_INCREMENT PRIMARY KEY ,
name varchar( 20 ) ,
username varchar( 20 ) ,
PASSWORD varchar( 20 )
)

*/


?>


