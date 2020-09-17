<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <title>联系我们_安祥网站</title>
    <link href="./css/header.css" rel="stylesheet" />
    <link href="./css/middle.css" rel="stylesheet" />
</head>
<body>
	 <?php include("header.php"); ?>
    <div class="container">
    <main class="main">
         <p class="contact"><img src="./img/tel.png" class="tel"><span class="hiddens">010-83210000</span></p>
         <p class="contact"><img src="./img/youxiang.png" class="mailbox"><span class="hiddens">gengyun120@qq.com</span></p>
         <p class="contact"><img src="./img/qq.png" class="qq"><span class="hiddens">12345678</span></p>
         <p class="contact"><img src="./img/dingwei.png" class="location"><span class="hiddens">xxx市xxx区xxx大道xxx街xxx号</span></p>
         <ul>
          <li class="form">姓名</li>
          <li><input type="text" id="name" class="fname inputs"></li>
          <li class="form">联系电话</li>
          <li><input type="text" id="phone" class="fname inputs"></li>
          <li class="form">留言内容</li>
          <li><textarea id="message" class="textareas inputs"></textarea></li> 
        </ul>
    </main>
      <div onclick="checkForm()" class="submit">
      	提交
      </div>
   </div>

    <?php include("footer.php"); ?>
</body>
<script src="js/layer.js"></script>
<script src="js/my.js" type="text/javascript" charset="utf-8"></script>
</html>

