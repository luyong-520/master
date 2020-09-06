<!DOCTYPE html>
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
      
      <!-- 中间的 -->
      <main id="home">
          <div id="div1">
              <h3>联系我们</h3>

                  <img src="img/tel.png" alt="" width="18px;" height="19px;" style="margin-top: 22px;">010-83210000
<br>
                  <img src="img/youxiang.png" alt="" width="18px;" height="14px;" style="margin-top: 20px;">gengyun120@qq.com
<br>
                  <img src="img/qq.png" alt="" width="18px;" height="18px;" style="margin-top: 20px;">12345678
<br>
                  <img src="img/dingwei.png" alt="" width="15px;" height="18px;" style="margin-left: 2px; margin-top: 22px;">xxx市xxx区xxx大道xxx街xxx号
<br>
          </div>
        <form action="" ></form>
          <div id="div2">
            <ul>
              <li>
                  <label for="name" style="margin-right: 52px;">姓名</label>
                  <input type="text" id="name" name="name" placeholder="" required="required" />
                </li>
                <li >
                  <label for="phone" style="margin-right: 24px;">联系电话</label>
                  <input type="phone" id="phone" name="phone" placeholder="" required="required" />
                  </li>
                  <li style="margin-top: 20px;">
                  <label for="message" style="margin-right: 24px; margin-top: 20px;">留言内容</label>
                  <textarea cols="45" rows="7" id="message" name="message" required="required" placeholder=""></textarea>
                    </li>
                    <li>
                  <input type="submit" name="submit" value="提交" id="submit"/>
                    </li>
                </ul>
                </div>
      </form>
      </main>
    </div>

     <!-- 底部 -->
     <?php include("footer.php"); ?>
</body>
</html>