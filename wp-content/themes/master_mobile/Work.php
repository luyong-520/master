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
FROM wp_term_relationships WHERE term_taxonomy_id =1  )";
//    查询结果
$sql = "SELECT ID,post_title,post_excerpt,post_content,COUNT(1) catnum
FROM wp_posts
WHERE ID IN
(SELECT object_id
FROM wp_term_relationships WHERE term_taxonomy_id =1  ) GROUP BY `post_title` ORDER BY ID ASC LIMIT $currentPage,$pageSize";       
$num = $wpdb->get_var($countsql); 
$rows = $wpdb->get_results($sql,ARRAY_A);
$count = ceil($num/$pageSize);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>师父著作_安祥网站</title>
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	<?php include('header.php') ?>
    <img class="weitu" src="./img/weitu.png">
    <div class="container">
    <main>
    	 <?php foreach ($rows as $key => $value) {?>
        <div class="lecturecontent">
          <span class="displayBlock"></span>
          <b class="displayBlock"><?php echo $value['post_title'] ?></b>
          <p class="displayBlock"><?php echo $value['post_excerpt'] ?></p>
          <a class="displayBlock" href=<?php echo "WorksCatalogone.php?page=0&&count=".$value['catnum']."&title=".$value['post_title'] ?> >阅读全文</a>
        </div>
         <?php }  ?>
        <?php include('showpagenation.php') ?>
    </main>
</div>

   <?php include('footer.php') ?>
</body>
<script type="text/javascript" src="js/my.js"></script>
<script type="text/javascript" src="js/category.js"></script>
</html>