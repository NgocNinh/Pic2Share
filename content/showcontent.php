<?php

    include('data/connect.php');            
    $sql_content = "select * from users a,content b where a.ID_user = b.Id_user";
    $result_content =  mysql_query($sql_content);


    while ($row_content = mysql_fetch_array($result_content))
    {
      
      //$row_comment = mysql_fetch_array($result_comment)

      ?>
      <div class="col-xs-12 col-md-6 col-lg-4 item">
        <div class="timeline-block">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="media">
                <div class="media-left">
                  <a href="">
                    <img src="images/avatar/110/<?php echo $row_content['avatar']; ?>" class="media-object" style="width:55px;">
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>

                  <a href=""><?php echo $row_content['username']; ?></a>

                  <span><?php echo $row_content['time_created']; ?></span>
                </div>
              </div>
            </div>

            <img src="content/uploads/<?php echo $row_content['url_img']; ?>" class="img-responsive">
            <div class="panel-body">
              <?php echo $row_content['description'];?>
            </div>
            <ul class="comments">
            <?php
              $content = $row_content['Id_content'];
              $sql_comment = "select u.username,u.avatar,cm.cmt,cm.time_cmt 
                              from comment cm
                              join content cnt
                              on cm.Id_content = cnt.Id_content
                              join users u
                              on cm.Id_user = u.Id_user
                              where cm.Id_content = $content";
              $result_comment =  mysql_query($sql_comment);
            if(mysql_query($sql_comment))
            {
              while($row_comment = mysql_fetch_array($result_comment))
              {
            ?>
                
                  <li clas="media">
                    <div class="media-left">
                      <a href="">
                        <img src="images/avatar/110/<?php echo $row_comment['avatar'];?>" class="media-object" style="width:50px;">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="pull-right dropdown" data-show-hover="li">
                        <a href="#" data-toggle="dropdown" class="toggle-button">
                          <i class="fa fa-pencil"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Edit</a></li>
                          <li><a href="#">Delete</a></li>
                        </ul>
                      </div>                          
                      <a href="" class="comment-author"><?php echo $row_comment['username'];?></a>
                      <span><?php echo $row_comment['cmt'];?></span>
                      <div class="comment-date"><?php echo $row_comment['time_cmt'];?></div>
                    </div>
                  </li>
			   <?php
              }
            }
            else
            {
              ?>
                <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
              <?php
              }
               ?>
                  <li class="comment-form">
                    <div class="input-group" style="width:100%">
                      <form method="post" action="content/comment.php">
                        
                        <input id="cmt" type="text" name="comment" class="form-control" onkeypress="return submitCmt();"/>
                        <!--<span class="input-group-btn">
                          <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                        </span>-->
                        <input type="hidden" name="Id_user" value="<?php echo $_SESSION['Id_user'];?>">
                        <input type="hidden" name="Id_content" value="<?php echo $row_content['Id_content'];?>">
                        <input type="hidden" name="time_cmt" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $mydate=date("Y-m-d H:i:s");echo $mydate;?>">
                      </form> 
                      
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>  
<?php
  }   
?>
<div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="images/people/50/guy-5.jpg" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>

                          <a href="">Ngọc</a>

                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>

                    <div class="panel-body">
                      Amazing 3D Animation
                    </div>
                    <!-- 4:3 aspect ratio -->
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
                    </div>

                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                      <li class="comment-form">
                        <div class="input-group">

                          <input type="text" class="form-control" />

                          <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>

                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
<script type="text/javascript">
  function submitCmt() 
  {
    if (e.keyCode == 13) 
    {
        var tb = document.getElementById("cmt");
        eval(tb.value);
        return false;
    }
  }
</script>