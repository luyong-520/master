<?php

   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $title= isset($_GET['title']) ? $_GET['title']:'安祥之美';
   $currentPage = ($page-1)*1;
   $signal =  "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =3  ) AND post_title='$title' ORDER BY ID ASC LIMIT $currentPage,1"; 
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =3  ) AND post_title='$title' ORDER BY ID ASC ";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $datas = $wpdb->get_results($signal,ARRAY_A);
   $count = count( $rows) ; 
// $count = 11 ; 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title><?php echo $title ?>_安祥网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include('header.php') ?>
    <div class="container">
    <main class="main">
        <div>
          <p class="workstwotitle textAlign marginToptwo"><?php echo $rows[0]['post_title'] ?></p>
          <p class="worksuAthor textAlign">（创作于<?php
         if(strpos($rows[0]['post_excerpt'], '&')){
            echo substr($rows[0]['post_excerpt'],strripos($rows[0]['post_excerpt'],"&")+1 );
         }else {
            echo "";
         }
        ?>）</p>
        </div>
       <div class="lecturetwo">
        <p><?php echo $datas[0]['post_content'] ?></p>
      </div>
      
    <!-- 分页    -->
    <?php include('detailepage.php') ?>
    </main>
  </div>

   <?php include('footer.php') ?>
   	<?php include('gotop.php') ?>	
</body>
<script type="text/javascript" src="js/my.js"></script>
<script type="text/javascript" src="js/detaile.js"></script>
</html>