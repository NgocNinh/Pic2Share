<?php
    include('data/connect.php');
    $sql_tag = "select * from tag";
    $result_tag =  mysql_query($sql_tag);
    
?> 



<form method="post" action="" enctype="multipart/form-data">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                      What's new
            </div>
            <div class="panel-body">
                <textarea name="description" class="form-control share-text" rows="1" placeholder="Share your Picture - your Feeling..."></textarea>
            </div>
            <div class="panel-footer share-buttons">
                <div id='Uploadform' style="display:none;">
                        
                    <input type="file" name="img_upload"/>
                          
                        
                </div>
                <a href="#" class="btn btn-cover" onclick='showUploadform()'><i class="fa fa-photo"></i></a>
                      
                <div class="form-group">
                    <span style='margin-left:5px; color:#ccc'>Tag:</span>
                    <input type="hidden" data-toggle="select2-tags" data-tags="<?php while($row_tag=mysql_fetch_array($result_tag)) {echo $row_tag['tag_content'].',';} ?>" style="width: 80%;" value="" />
                    <input type="submit" class="btn btn-primary btn-xs pull-right " name="uploadclick" value="Post" style='position:relative;float:right; margin-right:5px;vertical-align: middle;padding: 6px 15px;'>
                    <input type="hidden" name="Id_user" value="<?php echo $_SESSION['Id_user'];?>">
                    <input type="hidden" name="time_created" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $mydate=date("Y-m-d H:i:s");echo $mydate;?>">
                </div>
                      
                      
            </div>
        </div>
    </div>
</form>

<?php  
    // Nếu người dùng click Upload
  
    
    if (isset($_POST['uploadclick']))
    {
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['img_upload']))
        {
            $target_dir = "content/uploads/";
            $target_file = $target_dir . basename($_FILES["img_upload"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $uploadOk = 1;
            // Nếu file upload bị lỗi,
            // Tức là thuộc tính error > 0
			
            if ($_FILES['img_upload']['error'] > 0)
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
                move_uploaded_file($_FILES['img_upload']['tmp_name'], './content/uploads/'.$_FILES['img_upload']['name']);
                $Id_user = $_POST['Id_user'];
                $url = $_FILES['img_upload']['name'];
                $description = $_POST['description'];
                $time_created = $_POST['time_created'];
                $sql_post = "insert into content (Id_user, url_img, description, time_created) values ('$Id_user', '$url', '$description', '$time_created')";
                $result_post =  mysql_query($sql_post);    
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