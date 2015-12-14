<?php 
	$connect = mysql_connect("localhost", "root", "") or die("Không thể kết nối Server, vui lòng kiểm tra lại!.");
	mysql_select_db("pic2share_da", $connect) or die("Không thể kết nối CSDL!.");
	//mysql_query("SET NAMES 'utf-8'", $conn);
	 mysql_set_charset('utf8', $connect);
?>