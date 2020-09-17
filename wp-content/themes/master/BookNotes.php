<?php

   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $pageSize = 5;
   $currentPage = ($page-1)*$pageSize;
   $countsql = "SELECT COUNT(DISTINCT post_title) unm
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =2  )";
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =2  ) GROUP BY `post_title` ORDER BY ID ASC LIMIT $currentPage,$pageSize";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $num = $wpdb->get_var($countsql);  
   $count = ceil($num/$pageSize);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>耕云书笺_安祥网站</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
      
      <!-- 中间的表 -->
      <main class="lectureone">
      <?php foreach ($rows as $key => $value) {?>
        <div class="lecturecontent marginTop24">
          <span></span>
          <h1><?php echo $value['post_title']; ?></h1>
          <p><?php echo $value['post_excerpt']; ?></p>
          <a href="<?php echo 'BookNotesone.php?title='.$value['post_title']; ?>">阅读全文</a>
        </div>
        <?php } ?>
        </main>
        <!-- 分页    -->
       <div id="paging" style="margin-top:42px;">
        <button onclick="movepre('BookNotes.php')" class="arrowleft"><img src="./img/arrowleft.png"></button>
        <?php for($i=0;$i<$count;$i++) { ?>
        <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>,"BookNotes.php")' ><button class="pagingred"></button><?php echo $i+1; ?></a>
        <?php } ?>
        <button onclick="movenex(<?php echo $count ?>,'BookNotes.php')" class="arrowleft"><img src="./img/arrowright.png"></button>
      </div>
        </div>

     <!-- 底部 -->
     <?php get_footer();?>
    <script src="./js/js.js"></script>
    <script>
        var id = window.location.search?Number(window.location.search.split('=')[1]):1
        activeClass()
    //   function go(id) {
    //     window.location.href=`BookNotes.php?page=${Number(id)+1}`
    //   }
     
  </script>
</body>
</html>