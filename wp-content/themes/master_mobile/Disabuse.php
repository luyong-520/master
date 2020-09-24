<?php

   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $pageSize = 5;
   $currentPage = ($page-1)*$pageSize;
//    查询条数
   $countsql = "SELECT COUNT(DISTINCT post_title) unm
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =7  )";
//    查询结果
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =7  ) GROUP BY `post_title` ORDER BY ID ASC LIMIT $currentPage,$pageSize";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $num = $wpdb->get_var($countsql); 
   $count = ceil($num/$pageSize);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>师父解惑_安祥网站</title>
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	<?php include('header.php') ?>
    <nav class="container">
    <main>
    	  <?php foreach ($rows as $key => $value) {?>
        <div class="lecturecontent">
          <span class="displayBlock"></span>
          <b class="displayBlock"><?php echo $value['post_title']; ?></b>
          <p class="displayBlock"><?php echo substr($value['post_excerpt'],0,strripos($value['post_excerpt'],"&")); ?></p>
          <a class="displayBlock" href="<?php echo 'DisabusedeDatile.php?title='.$value['post_title']; ?>">阅读全文</a>
        </div>
        <?php } ?>
        	<!--分页-->
       <?php include('showpagenation.php') ?>
    </main>
    </nav>

    <?php include('footer.php') ?>
</body>
<script type="text/javascript" src="js/my.js"></script>
<script type="text/javascript" src="js/category.js"></script>
</html>