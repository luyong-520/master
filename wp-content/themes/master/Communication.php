<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>联系我们_安祥禅网站</title>
    <link href="./css/public.css?t=1545545" rel="stylesheet" />
    <link href="./css/middle.css?t=1545545" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>
<body>
    <div id="container">
    <?php include("header.php"); ?>
      
      <!-- 中间的 -->
      <main id="home">
          <div id="div1">
              <h3>联系我们</h3>

                  <img src="img/tel.png" alt="" width="18px;" height="19px;" style="margin-top: 22px;">13429888989
<br>
                  <img src="img/youxiang.png" alt="" width="18px;" height="14px;" style="margin-top: 20px;">3463763044@qq.com
<br>
                  <img src="img/qq.png" alt="" width="18px;" height="18px;" style="margin-top: 20px;">3463763044
<br>
                  <img src="img/dingwei.png" alt="" width="15px;" height="18px;" style="margin-left: 2px; margin-top: 22px;">湖北省武汉市东西湖区
<br>
          </div>
          <div id="div2">
            <ul>
              <li>
                  <label for="name" style="margin-right: 52px;">姓名</label>
                  <input type="text" id="name" name="name"  required="required" />
                </li>
                <li >
                  <label for="phone" style="margin-right: 24px;">联系电话</label>
                  <input type="phone" id="phone" name="phone"  required="required" />
                  </li>
                  <li style="margin-top: 20px;">
                  <label for="message" style="margin-right: 24px; margin-top: 20px;">留言内容</label>
                  <textarea cols="45" rows="7" id="message" name="message" ></textarea>
                    </li>
                    <p class="study">欢迎就安祥禅相关的问题进行交流学习</p>
                    <li>
                  <button   onclick="checkForm()"  id="submit">提交</button> 
                    </li>
                </ul>
                </div>
      </main>
    </div>

     <!-- 底部 -->
     <?php include("footer.php"); ?>
</body>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/layer.js"></script>
<script src="js/js.js"></script>
</html>
