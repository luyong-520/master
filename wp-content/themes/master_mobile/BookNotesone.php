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
    <title>Document</title>
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	<?php include("header.php"); ?>
    <nav class="container">
      <!-- 中间的表 -->
      <main class="main">
      	<div class="lecturecontent">
      		<p class="workstwotitle textAlign marginToptwo"><?php echo $rows[0]['post_title'] ?></p>
	        <div class="lecturefourbook">
	        <?php echo $datas[0]['post_content'] ?>
	        </div>
      	</div>
         </main>
    </nav>
        <div class="paging marginTopFO">
            <button class="arrowleft"><img src="./img/arrowleft.png"></button>
           <?php for($i=0;$i<$count;$i++) { ?>
	        <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>)' ><button class="pagingred"></button><?php echo $i+1; ?></a>
	        <?php } ?>
            <button class="arrowleft"><img src="./img/arrowright.png"></button>
        </div>  
     <!-- 底部 -->
     <?php get_footer();?>
    <script>
      window.onload = function () {
          let id
         if(window.location.search.indexOf('&&')>-1){
            window.location.search.split('&&').forEach(val => {
              if(val.indexOf('page')>-1){
                id = Number(val.split('=')[1])
              };
          });    
         }else{
             id = 1
         } 
         
       var paging = document.getElementsByClassName('paging')[0];
       var a = paging.getElementsByTagName("a");
       a[id-1].classList.add("active");
      } 
      function go(id) {
        let title
         if(window.location.search.indexOf('&&')>-1){
            window.location.search.split('&&').forEach(val => {
            
              if(val.indexOf('title')>-1){
                title = val.split('=')[1]
              };
          });    
         }else{
             title = window.location.search.split('=')[1]
         }    
        window.location.href=`BookNotesone.php?title=${title}&&page=${Number(id)+1}`
      }
  </script>
</body>
</html>