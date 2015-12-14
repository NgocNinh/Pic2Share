<?php
include('data/connect.php');  
$sql_tag = "select * from tag";
$result_tag =  mysql_query($sql_tag);
?>
<html>
<head class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">
  <link href="css/vendor/all.css" rel="stylesheet">

  
  <link href="css/app/app.css" rel="stylesheet">
</head>
<body>


<form method="post" action="content/tag.php">                        
    <input id="tag" type="text" name="tag" data-toggle="select2-tags" data-tags="<?php while($row_tag=mysql_fetch_array($result_tag)) {echo $row_tag['tag_content'].',';} ?>" style="width: 90%;" value="a" onkeypress="return submitTag();"/>
</form> 

<script src="js/vendor/all.js"></script>

  
  <script src="js/app/app.js"></script>
<script type="text/javascript">
  function submitTag() 
  {
    if (e.keyCode == 13) 
    {
        var tb = document.getElementById("tag");
        eval(tb.value);
        return false;
    }
  }
</script>
</body>
</

