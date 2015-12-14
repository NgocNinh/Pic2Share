<?php
ini_set('display_errors',0);
require_once('..\data\connect.php');
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
 
if (isset($_POST['submit']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    $fullname   = isset($_POST['InputFullname']) ? mysql_escape_string($_POST['InputFullname']) : '';
    $username   = isset($_POST['InputUsername']) ? mysql_escape_string($_POST['InputUsername']) : '';
    $password   = isset($_POST['InputPass']) ? md5($_POST['InputPass']) : '';
    $email      = isset($_POST['InputEmail'])    ? mysql_escape_string($_POST['InputEmail']) : '';
    $address      = isset($_POST['InputAddress'])    ? mysql_escape_string($_POST['InputAddress']) : '';
    $company      = isset($_POST['InputCompany'])    ? mysql_escape_string($_POST['InputCompany']) : ''; 
    $avatar     = 'avatar.png';
    $cover = rand(1,15)."jpg";
    
	 // Ki?m tra username ho?c email có b? trùng hay không
    $sqlc = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
     
    // Th?c thi câu truy v?n
    $resultc = mysql_query($sqlc);
     
    // N?u k?t qu? tr? v? l?n hon 1 thì nghia là username ho?c email dã t?n t?i trong CSDL
    if (mysql_num_rows($resultc) > 0)
    {
        // S? d?ng javascript d? thông báo
        ?>
        <script>
			alert('Username or Email is used');
			location.href = "sign_up.html";
		</script>
         <?php
        // D?ng chuong trình
        die ();
    }
    else 
	{
    
        // Ngược lại thì thêm bình thường
        $sql = "insert into users (fullname, username, password, email, avatar, cover, address, company) VALUES ('$fullname', '$username','$password','$email','$avatar','cover','$address','$company')";
		
		$result = mysql_query($sql);
         
        if ($result)
		{
        ?>
        <script>
			alert('Sign-up successfull!!! Welcome to Pic2share!');
			
			location.href = "../login.html";			
		</script>        
         <?php
		 /*header('Location:../chuadung/user-private-profile.html');*/
        }
        else 
		{
             ?>
        <script>
			alert('Cannot SignUp, Please try again!');
		</script>
         <?php
        }
    }
}
?>