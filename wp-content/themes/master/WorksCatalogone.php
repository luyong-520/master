<?php
   $page=(int)$_GET['page'];
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $title = isset($_GET['title'])?$_GET['title']:'爱的人生';
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =1  ) AND post_title='$title'  ORDER BY ID ASC  ;";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/public.css" rel="stylesheet" />
    <link href="css/middle.css" rel="stylesheet" />
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
      <!-- 中间的表 -->
      <main id="workstwo">
           <div id="workstwotitle">
               <h1><?php echo $rows[0]['post_title']; ?></h1>
           </div>
           <div id="workstwoarticle" style="background-color: #F1EEE3;">
              <p><?php echo $rows[$page]['post_content']; ?></p>
           </div>

           <div id="workstwochapter">
               <a onclick='pre()' href="javascript:void(0)">上一章</a>
               <a id="next" onclick='next(this)' href="javascript:void(0)" style="margin-left:5%; width: 45%;">下一章</a>
           </div>
      </main>
    </div>

     <!-- 底部 -->
     <?php get_footer();?>
    <script>
      function pre(params) {
        let page = 0
          window.location.search.split('&').forEach(val => {
              if(val.indexOf('page')>-1){
                page = val.split('=')[1]
              };
              if(val.indexOf('count')>-1){
                count = Number(val.split('=')[1])
              };
          });
          console.log(page,count)
           if(page <= 0){
            
           }else{
            page--
            window.location.href=`WorksCatalogone.php?page=${page}&&count=${count}`
           };  
      }
      function next(params) {
        let page = 0
        let count = 0
          window.location.search.split('&').forEach(val => {
              if(val.indexOf('page')>-1){
                page = val.split('=')[1]
              };
              if(val.indexOf('count')>-1){
                count = Number(val.split('=')[1])
              };
          });
          console.log(count)
           if(page >= count-1){
            document.getElementById('next').innerHTML='最后一章'
           }else{
            page++
            window.location.href=`WorksCatalogone.php?page=${page}&&count=${count}`
           };  
      }
  </script>
</body>
</html>