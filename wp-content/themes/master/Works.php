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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>导师著作_安祥禅网站</title>
    <link href="./css/public.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
   <?php get_header(); ?>
      <!-- 中间的表 -->
      <main class="lectureone">
       <?php foreach ($rows as $key => $value) {?>
        <div class="lecturecontent marginTop24">
        <span></span>
        <h1><?php echo $value['post_title'] ?></h1>
        <p><?php echo $value['post_excerpt'] ?></p>
        <a href=<?php echo "WorksCatalogone.php?page=0&&count=".$value['catnum']."&title=".$value['post_title'] ?> >阅读全文</a>
        </div>
       <?php }  ?>
      </main>

       <!-- 分页    -->
        <?php include('showpagenation.php') ?>
    </div>
    </div>

     <!-- 底部 -->
    <?php get_footer();?>
    
</body>
<script src="./js/js.js"></script>
<script src="js/category.js"></script>
</html>