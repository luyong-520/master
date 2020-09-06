<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?php bloginfo('template_directory'); ?>/js/rem.js"></script>
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" />
   
</head>
<body>
   <div class="container">
   <div class="anxiang">
   <img src="<?php bloginfo('template_directory'); ?>/img/anxiang.png">
   </div>

   <div class="homePage">
    <img src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
    

    <div class="homePagetitle">
        <ul class="pageone" style="margin-left:20px;">
            <li class="floatLeft"><a href="<?php bloginfo('template_directory'); ?>/AboutMaster.php">耕耘师父</a></li>
            <li class="floatRight"><a href="<?php bloginfo('template_directory'); ?>/AboutMaster.php">Master</a></li>
        </ul>
        <ul class="pageone">
            <li class="floatLeft"><a href="<?php bloginfo('template_directory'); ?>/Works.php">师父著作</a></li>
            <li class="floatRight"><a href="<?php bloginfo('template_directory'); ?>/Works.php">Works</a></li>
        </ul>
        <ul class="pageone">
            <li class="floatLeft"><a href="<?php bloginfo('template_directory'); ?>/Lecture.php">法音讲词</a></li>
            <li class="floatRight"><a href="Lecture.php">Lecturn</a></li>
        </ul>
        <ul class="pageone">
            <li class="floatLeft"><a href="<?php bloginfo('template_directory'); ?>/Videos.php">讲法视频</a></li>
            <li class="floatRight"><a href="<?php bloginfo('template_directory'); ?>/Videos.php">Video</a></li>
        </ul>
        <ul class="pageone">
            <li class="floatLeft"><a href="<?php bloginfo('template_directory'); ?>/Songs.php">禅曲欣赏</a></li>
            <li class="floatRight"><a href="<?php bloginfo('template_directory'); ?>/Songs.php">Songs</a></li>
        </ul>
        <ul class="pageone" style="margin-right:22px;">
            <li class="floatLeft"><a href="<?php bloginfo('template_directory'); ?>/Communication.php">在线交流</a></li>
            <li class="floatRight"><a href="<?php bloginfo('template_directory'); ?>/Communication.php">ContactUs</a></li>
        </ul>
        
    </div>
    <div class="nav">
    <a href="<?php bloginfo('template_directory'); ?>/AboutMaster.php" class="navone">师父简介</a>
    <a href="<?php bloginfo('template_directory'); ?>/MastersPicture.php" class="navtwo">师父法相</a>
    </div>
   </div>
   </div>
</body>
</html>
<script>
    window.onload = () => {
              document.documentElement.style.overflow='hidden';
              var move=function(e){
                e.preventDefault && e.preventDefault();
                e.returnValue=false;
                e.stopPropagation && e.stopPropagation();
                return false;
              }
              var keyFunc=function(e){
                if(37<=e.keyCode && e.keyCode<=40){
                  return move(e);
                }
              }
              document.body.onkeydown=keyFunc;
            }
  </script>