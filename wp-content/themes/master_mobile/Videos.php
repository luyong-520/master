<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $sql = "SELECT ID,post_excerpt,post_content,guid FROM wp_posts WHERE post_mime_type='video/mp4' ORDER BY ID ASC ";
   $rows = $wpdb->get_results($sql,ARRAY_A);
   if (strpos($_SERVER['HTTP_USER_AGENT'],'UCBrowser')!==false||strpos($_SERVER['HTTP_USER_AGENT'],'UCWEB')!==false){
     $is_qquc = 'qquc';
   }else if(strpos($_SERVER['HTTP_USER_AGENT'],'MQQBrowser')!==false){
    $is_qquc = 'qquc';
   }else if(strpos($_SERVER['HTTP_USER_AGENT'],'wv')!==false){
    $is_qquc = 'qquc';
   }else {
    $is_qquc = 'no_qquc';
   }
//    echo '<p style="font-size:.24rem;">'.$_SERVER['HTTP_USER_AGENT'].'</p>';
//    echo json_encode($rows, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>讲法视频_安祥禅网站</title>
    <link href="./css/header.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
</head>
<body>
	<?php include("header.php"); ?>
    <div class="container">
    <main>
    	 <?php foreach ($rows as $key => $value) { ?>
      <div class="videos">
      <?php if( $is_qquc =='qquc' ){ ?>
       <p>该浏览器暂不支持视频播放，请更换其它浏览器</p>
      <?php } ?>    
      <?php if( $is_qquc =='no_qquc' ){ ?>                           
      <video width="100%" poster='./img/shipin.jpg' height="100%" controls>
        <source src="<?php echo $value['guid'] ?>" type="video/mp4">
      </video>
      <?php } ?>    
      <span class="displayBlock"><?php echo $value['post_excerpt'] ?></span>
      <p class="displayBlock">讲于：<?php echo substr($value['post_content'],0,strrpos($value['post_content'],"&"));  ?></p>
      <p class="displayBlock">收录于：<?php echo substr($value['post_content'],strripos($value['post_content'],"&")+1);  ?></p>
      </div>
      <?php } ?>
    </main>
    </div>
    <?php include("footer.php"); ?>
</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="js/header.js"></script> 
</html>
