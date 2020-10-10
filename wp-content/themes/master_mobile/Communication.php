<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>联系我们_安祥禅网站</title>
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	 <?php include("header.php"); ?>
    <div class="container">
    <main class="main">
         <p class="contact">
         	<img src="./img/tel.png" class="tel">
         		<span class="hiddens">13429888989</span>
         </p>
         <p class="contact">
         	<img src="./img/youxiang.png" class="mailbox">
         		<span class="hiddens">3463763044@qq.com</span>
         </p>
         <p class="contact">
         	<img src="./img/qq.png" class="qq">
         		<span class="hiddens">3463763044</span>
         </p>
         <p class="contact">
         	<img src="./img/dingwei.png" class="location">
         		<span class="hiddens">湖北省武汉市东西湖区</span>
         </p>
         <ul>
          <li class="form">姓名</li>
          <li><input type="text" id="name" class="fname inputs"></li>
          <li class="form">联系电话</li>
          <li><input type="text" id="phone" class="fname inputs"></li>
          <li class="form">留言内容</li>
          <li><textarea id="message" class="textareas inputs"></textarea></li> 
        </ul>
    </main>
      <p class="study">欢迎就安祥禅相关的问题进行交流学习</p>
      <div onclick="checkForm()" class="submit">
      	提交
      </div>
   </div>

    <?php include("footer.php"); ?>
</body>
<script src="js/layer.js"></script>
<script src="js/my.js" type="text/javascript" charset="utf-8"></script>
</html>

