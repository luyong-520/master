<?php
   $page=isset($_GET['page']) ? (int)$_GET['page']: 0;
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
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title><?php echo $title ?>_安祥禅网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include('header.php') ?>
    <nav class="container">
    <main class="main">
        <div>
            <p class="workstwotitle textAlign">
            	<?php echo $rows[0]['post_title']; ?>		
           </p>
           <!-- <p class="worksuAthor textAlign">（创作于1957年/台北市拔提书店出版）</p>-->
        </div>
        <div class="workstwoarticle">
           <?php echo $rows[$page]['post_content']; ?></p>
        </div>

        <div class="workstwochapter">
        	<p ><a href="Work.php">返回上一级</a></p>
        	<p onclick='goback()'  >返回目录</p>
            <p onclick='pre()'  >上一章</p>
            <p onclick='next()' id="next" >下一章</a>
        </div> 
    </main>
    </nav>

    <?php include('footer.php') ?>
    <?php include('gotop.php') ?>	
</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="js/header.js"></script> 
<script>
	  let page = 0
      let title 
      let count = 0
	  window.location.search.split('&').forEach(val => {
              if(val.indexOf('page')>-1){
                page = val.split('=')[1]
              };
              if(val.indexOf('count')>-1){
                count = Number(val.split('=')[1])
              };
              if(val.indexOf('title')>-1){
                title = val.split('=')[1]
              };
          }); 
      function pre() {
           if(page <= 0){
           }else{
            page--
            window.location.href=`WorksCatalogone.php?page=${page}&&count=${count}&title=${title}`
           };  
      }
      function next(params) {
           if(page >= count-1){
            document.getElementById('next').innerHTML='最后一章'
           }else{
            page++
            window.location.href=`WorksCatalogone.php?page=${page}&&count=${count}&title=${title}`
           };  
      }
      function goback(){
      	window.location.href = `WorksCatalogone.php?page=0&count=${count}&title=${title}`
      }
  </script>
</html>
