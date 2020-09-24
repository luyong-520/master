<?php

   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $title= isset($_GET['title']) ? $_GET['title']:'“摩诃般若的要义与入门”会后解惑';
   $currentPage = ($page-1)*1;
   $signal =  "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =7  ) AND post_title='$title' ORDER BY ID ASC LIMIT $currentPage,1"; 
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =7  ) AND post_title='$title' ORDER BY ID ASC ";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $datas = $wpdb->get_results($signal,ARRAY_A);
   $count = count( $rows) ; 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?>_安祥网站</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>

      <!-- 中间的表 -->
      <main id="lecturetwo">
        <h6 class="testAlign" style="margin-top:19px;"><?php echo $rows[0]['post_title'] ?></h6>
        <p class="testAlign createtime">创作于<?php
        if(strpos($rows[0]['post_excerpt'], '&')){
            echo substr($rows[0]['post_excerpt'],strripos($rows[0]['post_excerpt'],"&")+1 );
         }else {
            echo "";
         }
         ?>
         </p>
        <div class="lecturetwo">
        <p> <?php echo $datas[0]['post_content'] ?></p>
       </div>
      

       <!-- 分页    -->
       <?php include('detailepage.php') ?>  
          
      </main>
    </div>

     <!-- 底部 -->
     <?php get_footer();?>
    
</body>
<script src="js/js.js"></script>
<script type="text/javascript" src="js/detaile.js"></script>
</html>