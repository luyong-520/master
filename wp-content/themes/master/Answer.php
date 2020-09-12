<?php

   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
   $title= isset($_GET['title']) ? $_GET['title']:'安祥之美';
   $currentPage = ($page-1)*1;
   $signal =  "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =3  ) AND post_title='$title' ORDER BY ID ASC LIMIT $currentPage,1"; 
   $sql = "SELECT post_content,ID,post_title,post_excerpt
   FROM wp_posts
   WHERE ID IN
   (SELECT object_id
   FROM wp_term_relationships WHERE term_taxonomy_id =3  ) AND post_title='$title' ORDER BY ID ASC ";       
   $rows = $wpdb->get_results($sql,ARRAY_A);
   $datas = $wpdb->get_results($signal,ARRAY_A);
   $count = count( $rows) ; 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" />
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>

      <!-- 中间的表 -->
      <main id="lecturetwo">
        <h6 class="testAlign" style="margin-top:19px;"><?php echo $rows[0]['post_title'] ?></h6>
        <p class="testAlign createtime" >创作于<?php
         if(strpos($rows[0]['post_excerpt'], '&')){
            echo substr($rows[0]['post_excerpt'],strripos($rows[0]['post_excerpt'],"&")+1 );
         }else {
            echo "";
         }
        ?></p>
        <div class="audio-wrapper">
          <!-- 音频 -->
          <!-- <audio controls class="gsls">
            <source src="http://www.anxiangchan.org.cn/uploads/media/20200509/1-200509100944E2.mp3" type="audio/mpeg">
          </audio> -->
      <!-- 音频结束         -->
        <div class="lecturetwo">
        <p> <?php echo $datas[0]['post_content'] ?></p>
       </div>
      

       <!-- 分页    -->
       <div id="paging" style="margin:42px auto;">
        <button class="arrowleft"><img src="./img/arrowleft.png"></button>
        <?php for($i=0;$i<$count;$i++) { ?>
        <a href="javascript:void(0)"  onclick='go(<?php echo $i ?>)' ><button class="pagingred"></button><?php echo $i+1; ?></a>
        <?php } ?>
        <button class="arrowleft"><img src="./img/arrowright.png"></button>
    </div>
          
      </main>
    </div>

     <!-- 底部 -->
     <?php get_footer();?>
    <script>
      window.onload = function () {
          let id
         if(window.location.search.indexOf('&')>-1){
            window.location.search.split('&').forEach(val => {
              if(val.indexOf('page')>-1){
                id = Number(val.split('=')[1])
              };
          });    
         }else{
             id = 1
         } 
       var paging = document.getElementById('paging');
       var a = paging.getElementsByTagName("a");
       a[id-1].classList.add("active");
      } 
      function go(id) {
        let title
         if(window.location.search.indexOf('&')>-1){
            window.location.search.split('&').forEach(val => {
            
              if(val.indexOf('title')>-1){
                title = val.split('=')[1]
              };
          });    
         }else{
             title = window.location.search.split('=')[1]
         }    
        window.location.href=`Answer.php?title=${title}&page=${Number(id)+1}`
      }
     
  </script>
</body>
</html>