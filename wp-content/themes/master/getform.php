<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
$name = $_GET['name'];
$phone = (int)$_GET['phone'];
$message = $_GET['message'];
$msg = ["code"=>"0","msg"=>"数据添加失败"];
$sql = "INSERT INTO wp_comments (comment_author,comment_author_email,comment_content) VALUES ('$name','$phone','$message')";
$wpdb->query($sql);
$rows= $wpdb->query($sql);
if($rows >0){
    $msg["code"] = "200";
    $msg["msg"] ="数据添加成功!!"; 
    echo json_encode($msg,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); 
}else{
    echo jjson_encode($msg,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); 
}
?>