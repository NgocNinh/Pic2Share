<?php
    include('data/connect.php');
    $sql_tag = "select * from tag";
    $result_tag =  mysql_query($sql_tag);
    //$row_tag = mysql_fetch_array($result_tag);
?> 
<form method="post" action="" enctype="multipart/form-data">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                      What's new
            </div>
            <div class="panel-body">
                <textarea name="status" class="form-control share-text" rows="1" placeholder="Share your Picture - your Feeling..."></textarea>
            </div>
            <div class="panel-footer share-buttons">
                <div id='Uploadform' style="display:none;">
                        
                    <input type="file" name="content"/>
                          <!--<input type="submit" name="uploadclick" value="Upload"/>-->
                        
                </div>
                <a href="#" class="btn btn-cover" onclick='showUploadform()'><i class="fa fa-photo"></i></a>
                      <!--<button type="submit" class="btn btn-primary btn-xs pull-right display-none" href="#">Post</button>-->
                <div class="form-group">
                    <span style='margin-left:5px; color:#ccc'>Tag:</span>
                    <input type="hidden" data-toggle="select2-tags" data-tags="<?php while($row_tag=mysql_fetch_array($result_tag)) {echo $row_tag['tag_content'].',';} ?>" style="width: 80%;" value="" />
                    <input type="submit" class="btn btn-primary btn-xs pull-right " name="uploadclick" value="Post" style='position:relative;float:right; margin-right:5px;vertical-align: middle;padding: 6px 15px;'>
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
        if (isset($_FILES['content']))
        {
            $target_dir = "contents/";
            $target_file = $target_dir . basename($_FILES["content"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $uploadOk = 1;
            // Nếu file upload bị lỗi,
            // Tức là thuộc tính error > 0
			
            if ($_FILES['content']['error'] > 0)
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
                <script> 
                    alert('Error while uploadding image! Please try again!!!');
                    location.href = "../index.php";
                </script>
                <?php           
            }
            else if ($uploadOk == 3)
            {               
                ?>
                <script> 
                    alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                    location.href = "../index.php";
                </script>
                <?php   
            }
            else if ($uploadOk == 4)
            {               
                ?>
                    <script> 
                        alert('Sorry, file already exists');
                        location.href = "../index.php";
                    </script>
                <?php   
            }
            else if ($uploadOk == 1)
            {               
                // Upload file
                move_uploaded_file($_FILES['content']['tmp_name'], './contents/'.$_FILES['content']['name']);
                ?>
                <script> 
                    alert('Uploaded!');
                    location.href = "../index.php";
                </script>  
               
                <?php            
            }
        }
        else
        {
            ?>
            <script> 
                alert('Please choose an image!');
                location.href = "../index.php";
            </script> 

            <?php
        }
    }
   
    
?>
