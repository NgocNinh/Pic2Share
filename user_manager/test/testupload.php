
    <?php  
    // Nếu người dùng click Upload
  
    
        if (isset($_POST['uploadclick']))
    {
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['avatar']))
        {
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $uploadOk = 1;
            // Nếu file upload bị lỗi,
            // Tức là thuộc tính error > 0
			
            if ($_FILES['avatar']['error'] > 0)
            {
                
                $uploadOk = 2;
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
                $uploadOk = 3;
            }
            else
            {
                if (file_exists($target_file)) 
                {
                    
                    $uploadOk = 4;
                }
            }
            if ($uploadOk == 2)
            {
                ?>
                <script> alert('Error while uploadding image! Please try again!!!');</script>
                <?php           
            }
            else if ($uploadOk == 3)
            {               
                ?>
                <script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>
                <?php   
            }
            else if ($uploadOk == 4)
            {               
                ?>
                    <script> alert('Sorry, file already exists');</script>
                <?php   
            }
            else if ($uploadOk == 1)
            {               
                // Upload file
                move_uploaded_file($_FILES['avatar']['tmp_name'], './upload/'.$_FILES['avatar']['name']);
                ?>
                <script> alert('Uploaded!');</script>   
                <?php            
            }
        }
        else
        {
            ?>
            <script> alert('Please choose an image!');</script> 
            <?php
        }
    }
   
    
?>
