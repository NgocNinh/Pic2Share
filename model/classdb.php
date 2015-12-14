<?php
class db{
	public $connect=NULL;
	public $result=NULL;
	public $host="localhost";
	public $user="root";
	public $pass="";
	public $db="pic2share_da";
	public $sql=NULL;
	function __construct(){
		$connect=mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->db);
		mysql_query("set names 'utf8'");
	}	
}
?>