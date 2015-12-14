<?php
session_start();
?>
<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Pic2Share</title>
  <!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="fancyBox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" href="fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="stylesheet" href="fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

  
  <link href="public/css/vendor/all.css" rel="stylesheet">

  
  <link href="public/css/app/app.css" rel="stylesheet">

  

</head>

<body>
  <?php
    $username = $_SESSION['username'];
    include('data/connect.php');            
    $sql_user = "select * from users where username='$username'";
    $result_user =  mysql_query($sql_user);
    $row_user = mysql_fetch_array($result_user);  
    
  ?>
  
  <div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
          <a class="navbar-brand" href="index.html">Pic2Share</a>
        </div>

  
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Themes</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-header">Public User Pages</li>
                <li class="active"><a href="chuadung/user-private-timeline.html">Timeline</a></li>
                <li><a href="chuadung/user-public-profile.html">About</a></li>
                <li><a href="chuadung/user-public-users.html">Friends</a></li>
                <li class="dropdown-header">Private User Pages</li>
                <li><a href="chuadung/user-private-messages.html">Messages</a></li>
                <li><a href="chuadung/user-private-profile.html">Profile</a></li>
                <li><a href="chuadung/user-private-timeline.html">Timeline</a></li>
                <li><a href="chuadung/user-private-users.html">Friends</a></li>
              </ul>
            </li>
            
          </ul>
          
        </div>
      </div>
    </div>

    
    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
      <div data-scrollable>
        
        <?php
        include('user_manager/sidebar.php');
        ?>
      </div>
    </div>

    
    <div class="st-pusher" id="content">
      <nav class="navbar navbar-subnav navbar-static-top margin-bottom-none" role="navigation">
            <div class="container-fluid">
              
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="fa fa-ellipsis-h"></span>
                </button>
              </div>
        
              <div class="collapse navbar-collapse" id="subnav">
                <ul class="nav navbar-nav ">
                  <li class="active"><a href="chuadung/user-private-timeline.html"><i class="fa fa-fw icon-home-fill-1"></i> Timeline</a></li>
                  <li><a href="chuadung/user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                  <li><a href="chuadung/user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                </ul>
                <ul class="nav navbar-nav hidden-xs navbar-right ">
                  <li><a href="#" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a></li>
                  
                  <li><a href="login.html"> Logout<i class="fa fa-fw fa-sign-out"></i></a></li>
                </ul>
              </div>
              
            </div>
      </nav>
      <div class="st-content">       
        <div class="st-content-inner">
          <div class="container-fluid">

            <div class="timeline row" data-toggle="isotope" style="min-height:230px; position:relative;">
              <div class="col-xs-12 col-md-6 col-lg-6 item">
                
                <?php
                  include('content/post.php')
                ?>
              </div>
            </div> 
            <div class="timeline row" data-toggle="isotope"> 
              
              
              <?php
                  include('content/showcontent.php')
                ?>
              
            </div>
          </div>
        </div>    
      </div>
    </div>
    

    <!-- Footer -->
    <footer class="footer">
      <strong>Pic2Share</strong> v4.0.0 &copy; Copyright 2015
    </footer>
    <!-- // Footer -->

  </div>
 



  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "social-2",
      skins: {
        "default": {
          "primary-color": "#16ae9f"
        },
        "orange": {
          "primary-color": "#e74c3c"
        },
        "blue": {
          "primary-color": "#4687ce"
        },
        "purple": {
          "primary-color": "#af86b9"
        },
        "brown": {
          "primary-color": "#c3a961"
        },
        "default-nav-inverse": {
          "color-block": "#242424"
        }
      }
    };
  </script>
  
  <script src="public/js/vendor/all.js"></script>
  
  <script src="public/js/app/app.js"></script>
<!--script popup-->
  <script type="text/javascript">
    $(document).ready(function() 
    {
      $(".i_popup").fancybox();
    });
  </script>
<!--script post-->
  <script type="text/javascript">
  function showUploadform()
  {
    document.getElementById("Uploadform").style.display = "block";
  }

  // function logout()
  // {
  //   <?php
  //   session_destroy();
  //   header('Location:login.html');
  //   ?>
  // }
    
  </script>

</body>
</html>