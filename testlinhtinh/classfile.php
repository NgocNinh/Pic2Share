<?php
include ('classdb.php');
class file extends db
{
	function upload_file()
	{
		
		$target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
    		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    		if($check !== false) 
    		{
        		echo "File is an image - " . $check["mime"] . ".";
        		$uploadOk = 1;
    		} 
    		else 
    		{
        		echo "File is not an image.";
        		$uploadOk = 0;
    		}
		}
// Check if file already exists
		if (file_exists($target_file)) 
		{
    		echo "Sorry, file already exists.";
    		$uploadOk = 0;
		}
// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000)	
		{
    		echo "Sorry, your file is too large.";
    		$uploadOk = 0;
		}
// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") 
		{
    		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		$uploadOk = 0;
		}
// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
    		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
		} 
		else 
		{
    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    		{
        		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
   			} 
    		else 
    		{
        		echo "Sorry, there was an error uploading your file.";
    		}
		}
		//if(uploadOk == 1)
		//{
			//$sqlupload="insert into users";
			//$result=mysql_query($sqltinmoi);
		//}		
		return $_FILES["fileToUpload"]["name"];
	}
	function create_avatar($file_name_avatar)
	{
		$sql_create_avatar = "INSERT INTO users(avatar) VALUES ('$file_name_avatar')";
		$result_create_avatar = mysql_query($sql_create_avatar);
		return $result_create_avatar;
	}
	function create_background($file_name_background)
	{
		$sql_create_background = "INSERT INTO users(background) VALUES ('$file_name_background')";
		$result_create_background = mysql_query($sql_create_background);
		return $result_create_background;
	}
}
?>