<!DOCTYPE html>
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
//       layer.open({
//              content: '手机号码填写有误，请重新填写',
//             });
          layer.msg('手机号码填写有误，请重新填写');
      }
    }else{
        flag=false
//      layer.open({
//              content: '姓名不能为空，请重新填写',
//             });
       layer.msg('姓名不能为空，请重新填写');        
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

