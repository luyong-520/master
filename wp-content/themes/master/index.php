<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>安祥禅网站</title>
    <script src="<?php bloginfo('template_directory'); ?>/js/rem.js"></script>
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>?t=v1.0.0" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
</head>
<audio class="baradio" src="<?php echo esc_url( home_url( ) );?>/wp-content/uploads/2020/09/backradio.mp3" loop autoplay muted></audio>
   <div class="container">
   <div class="anxiang">
   <img src="<?php bloginfo('template_directory'); ?>/img/anxiang.png">
   </div>
   <div class="homePage">
    
    <div class="homePagetitle">
        <ul class="pageone" style="margin-left:20px;">
            <li class="floatLeft clearfix"><a href="<?php bloginfo('template_directory'); ?>/AboutMaster.php">耕云导师</a></li>
            <li class="floatRight clearfix"><a href="<?php bloginfo('template_directory'); ?>/AboutMaster.php">Master</a></li>
            <div class="first_pic ">
             <img src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
             <div class="nav">
                <a href="<?php bloginfo('template_directory'); ?>/AboutMaster.php" style="margin-left:20px" class="navone">导师简介</a>
                <a href="<?php bloginfo('template_directory'); ?>/MastersPicture.php" >导师法相</a>
            </div>
            </div>
        </ul>
         <ul class="pageone">
            <li class="floatLeft clearfix"><a href="<?php bloginfo('template_directory'); ?>/Works.php">导师著作</a></li>
            <li class="floatRight clearfix"><a href="<?php bloginfo('template_directory'); ?>/Works.php">Works</a></li>
            <div class="sec_pic dno">
             <img src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
            </div>
        </ul>
        <ul class="pageone">
            <li class="floatLeft clearfix"><a href="<?php bloginfo('template_directory'); ?>/Lecture.php">法音讲词</a></li>
            <li class="floatRight clearfix"><a href="Lecture.php">Lecturn</a></li>
            <div class="first_pic dno">
             <img style="margin-left:2px;" src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
             <div class="nav">
                <a href="<?php bloginfo('template_directory'); ?>/Lecture.php"  >导师讲词</a>
                <a href="<?php bloginfo('template_directory'); ?>/Disabuse.php"  >导师解惑</a>
                <a href="<?php bloginfo('template_directory'); ?>/BookNotes.php"   >耕云书笺</a>
            </div>
            </div>
        </ul>
        <ul class="pageone">
            <li class="floatLeft clearfix"><a href="<?php bloginfo('template_directory'); ?>/Videos.php">讲法视频</a></li>
            <li class="floatRight clearfix"><a href="<?php bloginfo('template_directory'); ?>/Videos.php">Videos</a></li>
            <div class="sec_pic dno">
             <img style="margin-left:4px;" src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
            </div>
        </ul>
        <ul class="pageone">
            <li class="floatLeft clearfix"><a href="<?php bloginfo('template_directory'); ?>/Songs.php">禅曲欣赏</a></li>
            <li class="floatRight clearfix"><a href="<?php bloginfo('template_directory'); ?>/Songs.php">Songs</a></li>
            <div class="first_pic dno">
             <img style="margin-left:4px;" src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
            </div>
        </ul>
        <ul class="pageone" style="margin-right:22px;">
            <li class="floatLeft clearfix"><a href="<?php bloginfo('template_directory'); ?>/Communication.php">联系我们</a></li>
            <li class="floatRight clearfix"><a href="<?php bloginfo('template_directory'); ?>/Communication.php">ContactUs</a></li>
            <div class="sec_pic dno">
             <img style="margin-left:5px;" src="<?php bloginfo('template_directory'); ?>/img/navbg.png">
            </div>
        </ul> 
        
    </div>
   </div>
   </div>
</body>
 <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.10.2.min.js"></script>
 <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    document.body.addEventListener('mousedown', function(){
        var vdo = $("audio")[0]; //jquery
        vdo.play()
        vdo.muted = false;
    }, false);
    window.onload = function() {
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
            $('.pageone').hover(function(){
            $('.pageone').children('div').css('display','none');
             $(this).children('div').css('display','block');
             },function () {
                $(this).children('div').css('display','none');   
             }
)
  </script>
</html>