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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?>_安祥网站</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
      
      <!-- 中间的表 -->
      <main class="lecturefour">
        <h3 class="testAlign"><?php echo $rows[0]['post_title'] ?></h3>
        <div class="lecturefourbook">
        <?php echo $datas[0]['post_content'] ?>
        </div> 
        
         <!-- 分页    -->
       <div id="paging" style="margin:42px auto;">
        <button onclick="detailePre('BookNotesone.php')" class="arrowleft"><img src="./img/arrowleft.png"></button>
        <?php for($i=0;$i<$count;$i++) { ?>
        <a href="javascript:void(0)"  onclick='godetaile(<?php echo $i ?>,"BookNotesone.php")' ><button class="pagingred"></button><?php echo $i+1; ?></a>
        <?php } ?>
        <button onclick="detaileNex(<?php echo $count ?>,'BookNotesone.php')" class="arrowleft"><img src="./img/arrowright.png"></button>
    </div>
          
      </main>
    </div>

     <!-- 底部 -->
     <?php get_footer();?>
     <script src="js/js.js"></script>
<script>
      let id = getId()
      activeClass()
  </script>
</body>
</html>