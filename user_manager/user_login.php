<?php
session_start();

require_once ('..\data\connect.php');

// kiểm tra các giá trị nhập vào từ form login
if(isset($_POST['ok']))
{
	$u=$p='';
	if($_POST['username'] == NULL)
	{
		echo "Retype your username, Please!";
	}
	else
	{
		$u=$_POST['username'];
	}
	if($_POST['password'] == NULL)
	{
		echo "Retype your password, Please!";
	}
	else
	{
		$p=md5($_POST['password']);
	}
}

//kiểm tra username và password trong csdl
if($u && $p)
	{
		$sql="select * from users where username='".$u."' and password='".$p."'";
		$query=mysql_query($sql);
		if(mysql_num_rows($query) == 0)
		{
			echo "Username or password is not correct, please try again";
			echo $p;
		}
		else
		{
			$row=mysql_fetch_array($query);
			//echo $row['username'];
			//echo $row['email'];
			
			$_SESSION['username'] = $row['username']; 
			$_SESSION['Id_user'] = $row['Id_user']; 			 
			?>
			<script>
				alert('Welcome to Pic2share!');
			</script>
			<?php
			header('Location:../index.php');
		}
	}

?>