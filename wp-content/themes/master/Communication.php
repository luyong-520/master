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
<script>
function checkForm(){
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;
    let flag = false;
    var reg = /^1[3|4|5|7|8]\d{9}$/;
    if(name ){
      if(reg.test(phone)){
        flag=true
      }else{
        flag=false
         layer.open({
                content: '手机号码填写有误，请重新填写',
                });
      }
    }else{
        flag=false
        layer.open({
                content: '姓名不能为空，请重新填写',
                });
    } 
    if(flag){
        $.get(`getform.php?name=${name}&phone=${phone}&message=${message}`,function (result) {
         var res = JSON.parse (result) 
         if(res.code=='200'){
            layer.msg(res.msg);
            document.getElementById('name').value=''
            document.getElementById('phone').value=''
            document.getElementById('message').value=''
         }else{
            layer.msg(res.msg); 
         }
        })
       
    }
}
</script>
</html>
