<?php
   $page=(int)$_GET['page'];
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $title = isset($_GET['title'])?$_GET['title']:'爱的人生';
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =1  ) AND post_title='$title'  ORDER BY ID ASC  ;";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?>_安祥网站</title>
    <link href="css/public.css?t=1545545" rel="stylesheet" />
    <link href="css/middle.css?t=1545545" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
      <!-- 中间的表 -->
      <main id="workstwo">
           <div id="workstwotitle">
               <h1><?php echo $rows[0]['post_title']; ?></h1>
           </div>
           <div id="workstwoarticle" style="background-color: #F1EEE3;">
              <p><?php echo $rows[$page]['post_content']; ?></p>
           </div>

           <div id="workstwochapter">
               <a  href="Works.php">返回上一级</a>
               <a onclick='workpre()' href="javascript:void(0)">上一章</a>
               <a id="next" onclick='worknext()' href="javascript:void(0)" style="margin-left:5%; width: 45%;">下一章</a>
           </div>
      </main>
    </div>

     <!-- 底部 -->
     <?php get_footer();?>
   
</body>
<script src="js/js.js"></script>
</html>