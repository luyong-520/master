<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>安祥网站</title>
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" />
</head>
<body>
	<audio class="baradio" src="<?php echo esc_url( home_url( ) ); ?>/wp-content/uploads/2020/09/backradio.mp3" autoplay muted></audio>
    <div class="container">
     <ul>
        <li class="anxiang"><img src="<?php bloginfo('template_directory'); ?>/img/anxiang.png"></li>
     </ul>

     <div class="menu menu-one">
     <ul >
        <li class="page_item page-item-2">
            <a href="<?php bloginfo('template_directory'); ?>/Master.php" class="sizeone">耕云师父</a>
            <a href="<?php bloginfo('template_directory'); ?>/Master.php" class="sizetwo">Master</a>
        </li>
        <div  class="nav_master">
      			<a href="<?php bloginfo('template_directory'); ?>/Master.php">师父简介</a>
      			<a href="<?php bloginfo('template_directory'); ?>/MastersPicture.php">师父法相</a>
        </div>
     </ul>
     <ul >
        <li class="page_item page-item-2">
            <a href="<?php bloginfo('template_directory'); ?>/Lecture.php" class="sizeone">法音讲词</a>
            <a href="<?php bloginfo('template_directory'); ?>/Lecture.php" class="sizetwo">Lecture</a>
         </li>
         <div  class="nav_lecture">
      			<a href="<?php bloginfo('template_directory'); ?>/Lecture.php"  >师父讲词</a>
                <a href="<?php bloginfo('template_directory'); ?>/Disabuse.php"  >师父解惑</a>
                <a href="<?php bloginfo('template_directory'); ?>/BookNotes.php"   >耕云书笺</a>
        </div>
     </ul>
     <ul style="margin-left: .1rem;">
        <li class="page_item page-item-2">
            <a href="<?php bloginfo('template_directory'); ?>/Songs.php" class="sizeone">禅曲欣赏</a>
            <a href="<?php bloginfo('template_directory'); ?>/Songs.php" class="sizetwo">Songs</a>
         </li>
     </ul>
     </div>

     <ul class="above flex">
        <img src="<?php bloginfo('template_directory'); ?>/img/above.png" class="above-left">
        <img src="<?php bloginfo('template_directory'); ?>/img/above.png">
        <img src="<?php bloginfo('template_directory'); ?>/img/above.png" class="above-right"> 
     </ul>

     <ul>
       <li class="borders" ></li>
     </ul>

     <ul class="below flex">
        <img src="<?php bloginfo('template_directory'); ?>/img/below.png" class="above-left">
        <img src="<?php bloginfo('template_directory'); ?>/img/below.png">
        <img src="<?php bloginfo('template_directory'); ?>/img/below.png" class="above-right"> 
     </ul>

     <div class="menu menu-two">
        <ul>
           <li class="page_item page-item-2">
            <a href="<?php bloginfo('template_directory'); ?>/Work.php" class="sizeone">师父著作</a>
            <a href="<?php bloginfo('template_directory'); ?>/Work.php" class="sizetwo">Work</a>
           </li>
        </ul>
        <ul>
           <li class="page_item page-item-2">
            <a href="<?php bloginfo('template_directory'); ?>/Videos.php" class="sizeone">讲法视频</a>
            <a href="<?php bloginfo('template_directory'); ?>/Videos.php" class="sizetwo">Videos</a>
            </li>
        </ul>
        <ul>
           <li class="page_item page-item-2">
            <a href="<?php bloginfo('template_directory'); ?>/Communication.php" class="sizeone">联系我们</a>
            <a href="<?php bloginfo('template_directory'); ?>/Communication.php" class="sizetwo">Contact&nbsp;Us</a>
            </li>
        </ul>
       </div>
     
</body>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript">
	 document.body.addEventListener('touchend', function(){
        var vdo = $("audio")[0]; //jquery
        vdo.play();
        vdo.muted = false;
    }, false);
</script>
</html>
