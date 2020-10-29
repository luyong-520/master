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
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>耕云书笺_安祥禅网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include("header.php"); ?>
	<div class="container">
      <main >
      <?php foreach ($rows as $key => $value) {?>
        
        <div class="lecturecontent">
          <span class="displayBlock"></span>
          <b class="displayBlock"><?php echo $value['post_title']; ?></b>
          <p class="displayBlock"><?php echo $value['post_excerpt']; ?></p>
          <a class="displayBlock" href="<?php echo 'BookNotesone.php?title='.$value['post_title']; ?>">阅读全文</a>
        </div>
        <?php } ?>
        </main>
         <!-- 分页    -->
      <?php include('showpagenation.php') ?>
        </nav>
       
     <!-- 底部 -->
     <?php get_footer();?>

</body>
   <script type="text/javascript" src="js/my.js"></script>
   <script type="text/javascript" src="js/category.js"></script>
   <script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
   <script type="text/javascript" src="js/header.js"></script> 
</html>