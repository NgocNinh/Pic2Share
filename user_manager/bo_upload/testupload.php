<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="image_upload"/>
        <input type="submit" name="uploadclick" value="Upload"/>

    </form>
    <?php // Xử Lý Upload
    
    //Nếu người dùng click Upload
    if (isset($_POST['uploadclick']))
    {
        // Nếu người dùng có chọn file để upload
        if (isset($_FILES['image_upload']))
        {
            // Nếu file upload không bị lỗi,
            // thuộc tính error > 0
            if ($_FILES['image_upload']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                // Upload file
                move_uploaded_file($_FILES['image_upload']['tmp_name'], './upload/'.$_FILES['image_upload']['name']);
                echo 'File Uploaded';
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
?>
</body>
</html>