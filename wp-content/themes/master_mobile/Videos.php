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
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	<?php include("header.php"); ?>
    <div class="container">
    <main>
    	 <?php foreach ($rows as $key => $value) { ?>
      <div class="videos">
      <video width="100%" poster='./img/shipin.jpg' height="100%" controls>
        <source src="<?php echo $value['guid'] ?>" type="video/mp4">
      </video>
      <span class="displayBlock"><?php echo $value['post_excerpt'] ?></span>
      <p class="displayBlock">讲于：<?php echo substr($value['post_content'],0,strrpos($value['post_content'],"&"));  ?></p>
      <p class="displayBlock">收录于：<?php echo substr($value['post_content'],strripos($value['post_content'],"&")+1);  ?></p>
      </div>
      <?php } ?>
    </main>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
