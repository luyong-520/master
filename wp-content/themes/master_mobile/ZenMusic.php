<?php
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
   require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
   $id = $_GET['id'];
   $sql = "SELECT ID,post_title,post_content,post_excerpt
   FROM wp_posts where ID = '$id'";       
   $rows = $wpdb->get_results($sql,ARRAY_A);  
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
    <main class="main">
        <div>
          <p class="workstwotitle textAlign marginToptwo"><?php echo $rows[0]['post_title'] ?></p>
          <p class="worksuAthor textAlign"><?php echo $rows[0]['post_excerpt'] ?></p>
        </div>
        <div class="zenmusic">
          <p><?php echo $rows[0]['post_content'] ?></p>
      </div>
    
    </main>
</div>

    <?php include("footer.php"); ?>
</body>
</html>