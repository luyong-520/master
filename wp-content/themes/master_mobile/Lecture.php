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
   FROM wp_term_relationships WHERE term_taxonomy_id =3  )";
//    查询结果
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =3  ) GROUP BY `post_title` ORDER BY ID ASC LIMIT $currentPage,$pageSize";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $num = $wpdb->get_var($countsql); 
   $count = ceil($num/$pageSize);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
          <a class="displayBlock" href="<?php echo 'Answer.php?title='.$value['post_title']; ?>">阅读全文</a>
        </div>
        <?php } ?>
        	
        <div class="paging marginTopFO">
            <button class="arrowleft"><img src="./img/arrowleft.png"></button>
           <?php for($i=0;$i<$count;$i++) { ?>
	        <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>)' ><button class="pagingred"></button><?php echo $i+1; ?></a>
	        <?php } ?>
            <button class="arrowleft"><img src="./img/arrowright.png"></button>
        </div>
    </main>
    </nav>

    <?php include('footer.php') ?>
</body>
<script>
      window.onload = function () {
       var id = window.location.search?Number(window.location.search.split('=')[1]):1
       var paging = document.getElementsByClassName('paging')[0];
       var a = paging.getElementsByTagName("a");
       a[id-1].classList.add("active");
      } 
      function go(id) {
        window.location.href=`Lecture.php?page=${Number(id)+1}`
      }
     
  </script>
</html>