<?php
require_once('../model/classpic2share.php');
require_once('../data/connect.php');
//require_once('../view/sign_up.html');

// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
 
if (isset($_POST['submit']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    $fullname = isset($_POST['InputFullname'])? mysql_escape_string($_POST['InputFullname']) : '';
    $username = isset($_POST['InputUsername'])? mysql_escape_string($_POST['InputUsername']) : '';
    $password = isset($_POST['InputPass'])? md5($_POST['InputPass']) : '';
    $email = isset($_POST['InputEmail'])? mysql_escape_string($_POST['InputEmail']) : '';
    $address = isset($_POST['InputAddress'])? mysql_escape_string($_POST['InputAddress']) : '';
    $company = isset($_POST['InputCompany'])? mysql_escape_string($_POST['InputCompany']) : '';

   
    // Kiểm tra username hoặc email có bị trùng hay không
    //$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
     
    // Thực thi câu truy vấn
    //$result = mysql_query($sql);
	//echo $result;
     
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    //if (mysql_num_rows($result) > 0)
    //{
        // Sử dụng javascript để thông báo
        /*?>
        <script>
			alert('Username or Email is used');
		</script>
         <?php
        // Dừng chương trình
        die ();
    }
    else 
	{*/
        // Ngược lại thì thêm bình thường
		 /*$p = new pic2share;   
		 $signup = $p->signup($fullname,$username,$password,$email,$address,$company); 
         echo $signup; */    
         $sqlsignup="INSERT INTO users (fullname, username, password, email, address, company) VALUES ('$fullname', $username','$password','$email','$address', $company)";
		$resultsignup=mysql_query($sqlsignup, $connect);
        if (mysql_query($resultsignup))
		{
        ?>
        <script>
			alert('Sign-up successfull!!! Welcome to Pic2share!');
		</script>
         <?php
        }
        else 
		{
             ?>
        <script>
			alert('Error, please try again!');
		</script>
         <?php
        }
    }
?>