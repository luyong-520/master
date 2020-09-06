<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $sql = "SELECT ID,post_excerpt,post_content,guid FROM wp_posts WHERE post_mime_type='video/mp4' ORDER BY ID ASC ";
   $rows = $wpdb->get_results($sql,ARRAY_A);
//    echo json_encode($rows, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/public.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
    <div id="container">
       
    <?php include("header.php"); ?>
      <!-- 中间的表 -->
      <main>
        <div id="videosone">
         <?php foreach ($rows as $key => $value) { ?>
           <div class="videoones">
            <a href="javascript:void(0)"><video width="492" height="369" controls>
              <source src="<?php echo $value['guid'] ?>" type="video/mp4">
            </video></a>
            <p style="color:#D18324;margin-top:20px;"><?php echo $value['post_excerpt'] ?></p>
            <p style="margin-top:5px;">讲于：<?php echo substr($value['post_content'],0,strrpos($value['post_content'],"&"));  ?></p>
            <p>收录于：<?php echo substr($value['post_content'],strripos($value['post_content'],"&")+1);  ?></p></p>
           </div>
          <?php } ?>
        </div>
          
      </main>
    </div>

     <!-- 底部 -->
     <?php include("footer.php"); ?>
</body>
</html>