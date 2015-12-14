<?php
include ('classdb.php');
class pic2share extends db
{
	function signup($fullname,$username,$password,$email,$address,$company)
	{		
		$sqlsignup="INSERT INTO users (fullname, username, password, email, address, company) VALUES ('$fullname', $username','$password','$email','$address', $company)";
		$resultsignup=mysql_query($sqlsignup);
		return $resultsignup;
	}
	
	function signin()
	{
		
	}
	
	function upload()
	{
		
	}
	
	function update_user()
	{
		
	}
	
	
	
	function update_ima()
	{
		
	}
	
	function make_friend()
	{
		
	}
	
	
}
?>