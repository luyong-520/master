<?php

   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $title= isset($_GET['title']) ? $_GET['title']:'示观然';
   $currentPage = ($page-1)*1;
   $signal =  "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =2  ) AND post_title='$title' ORDER BY ID ASC LIMIT $currentPage,1"; 
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =2  ) AND post_title='$title' ORDER BY ID ASC ";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $datas = $wpdb->get_results($signal,ARRAY_A);
   $count = count( $rows) ; 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title><?php echo $title ?>_安祥禅网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include("header.php"); ?>
    <div class="container">
      <!-- 中间的表 -->
      <main class="main">
      	<div class="lecturecontent">
      		<p class="workstwotitle textAlign marginToptwo"><?php echo $rows[0]['post_title'] ?></p>
	        <div class="lecturefourbook">
	        <?php echo $datas[0]['post_content'] ?>
	        </div>
      	</div>
         </main>
          <?php include('detailepage.php') ?>
    </div>
       
     <!-- 底部 -->
     <?php get_footer();?>
     <?php include('gotop.php') ?>
      
</body>
<script type="text/javascript" src="js/my.js"></script>
<script type="text/javascript" src="js/detaile.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="js/header.js"></script> 
</html>