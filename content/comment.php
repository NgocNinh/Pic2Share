<?php
	$Id_user = $_POST['Id_user'];
	$cmt = $_POST['comment'];
	$Id_content = $_POST['Id_content'];
	$time_cmt = $_POST['time_cmt'];
	include('../data/connect.php');            
    $sql_comment = "insert into comment (Id_content, Id_user, cmt, time_cmt) values ($Id_content, $Id_user, '$cmt', '$time_cmt')";
    $result_comment =  mysql_query($sql_comment);
    if ($result_comment)
	{
        ?>
        <script>			
			location.href = "../index.php";			
		</script>
	<?php
	}
	else 
	{
        ?>
        <script>
			alert('Please try again!');
		</script>
         <?php
    }
?>