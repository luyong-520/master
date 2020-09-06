<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $id = $_GET['id'];
   $sql = "SELECT ID,post_title,post_content,post_excerpt
   FROM wp_posts where ID = '$id'";       
   $rows = $wpdb->get_results($sql,ARRAY_A);  
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
      
      <!-- 中间的表 -->
      <main>
        <div class="songstwo">
            <h4><?php echo $rows[0]['post_title'] ?></h4>
            <p><?php echo $rows[0]['post_excerpt'] ?></p>
            <!-- 音频 -->
          <!-- <audio controls class="gsls" style="margin:19px auto;">
            <source src="./img/gsls.mp3" type="audio/mpeg">
          </audio> -->
      <!-- 音频结束         -->
      <div class="songstwolyric" style="margin-top:40px;">
        <p><?php echo $rows[0]['post_content'] ?></p>
      </div>


        </div>  
      </main>
    </div>

     <!-- 底部 -->
     <?php get_footer();?>
</body>
</html>