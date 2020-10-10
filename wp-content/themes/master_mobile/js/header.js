    jQuery.fn.slideLeftHide = function( speed, callback ) {  
        this.animate({  
            width : "hide",  
            paddingLeft : "hide",  
            paddingRight : "hide",  
            marginLeft : "hide",  
            marginRight : "hide"  
        }, speed, callback );  
    };  
    jQuery.fn.slideLeftShow = function( speed, callback ) {  
        this.animate({  
            width : "show",  
            paddingLeft : "show",  
            paddingRight : "show",  
            marginLeft : "show",  
            marginRight : "show"  
        }, speed, callback );  
    }; 
//禁止屏幕滑动
   function	stop(){
		var mo=function(e){e.preventDefault();};
		document.body.style.overflow='hidden';
		document.addEventListener('touchmove',mo,false);//禁止页面滑动
		}
		//开启滑动
    function move(){
		var mo=function(e){e.preventDefault();};
		document.body.style.overflow='visible';//出现滚动条
		document.removeEventListener('touchmove',mo,false);
		}
		//防止滚动之后，navbar 导航的图层会有偏差
		 window.onscroll= function(){
                //变量t是滚动条滚动时，距离顶部的距离
                var t = document.documentElement.scrollTop||document.body.scrollTop;
                if(t>0){
                	$(".navbar").css({'top':t+'px'})
                }else{
                	$(".navbar").css({'top':0})
                }
            }
    //点击导航的按钮
    $(".menu").click(function(){
       $(".navbar").slideLeftShow (500); 
       $(".navbar ul").show (500);  
       stop()         
    })
    //点击导航关闭按钮
    $('.close').click(function  () {
    	event.stopPropagation();
    	$(".navbar").slideLeftHide (500);  
    	$(".navbar ul").hide (); 
    	$(".lecture_content").hide ();  
    	$(".nav_content").hide ();
    	move()
    })
    let hrefurl = location.href.substr(location.href.lastIndexOf('/')+1);
    var urlstr = hrefurl.indexOf('?')>-1? hrefurl.substr(0,hrefurl.indexOf('?')):hrefurl ;
    // 判断那个页面，然后那个页码navbar高亮
    let id = 0
    if(urlstr == 'Master.php' ||urlstr == 'MastersPicture.php' ){
    	id = 1
    }
    if(urlstr == 'Work.php' ||urlstr == 'WorksCatalogone.php' ){
    	id = 2
    }
    if(urlstr == 'Lecture.php' ||urlstr == 'Answer.php'||urlstr == 'Disabuse.php'|| urlstr == 'DisabusedeDatile.php'||urlstr == 'BookNotes.php'|| urlstr == 'BookNotesone.php'){
    	id = 3
    }
    
    if(urlstr == 'Videos.php' ){
    	id = 4
    }
    if(urlstr == 'Songs.php' ||urlstr =='ZenMusic.php' ){
    	id = 5
    }
    if(urlstr == 'Communication.php'  ){
    	id = 6
    }
    let bindex = -1
     if(urlstr == 'Master.php'  ){
    	bindex = 0
    	}
    	if(urlstr == 'MastersPicture.php' ){
    	bindex = 1
    	}
    let aindex = -1
    if(urlstr == 'Lecture.php' ||urlstr == 'Answer.php'){
    	aindex = 0
    }
    if(urlstr == 'Disabuse.php'|| urlstr == 'DisabusedeDatile.php'){
    	aindex = 1
    }
     if(urlstr == 'BookNotes.php'|| urlstr == 'BookNotesone.php'){
    	aindex = 2
    }
    $('.navbar .nav_b').eq(id).css({'color':'#D18324'}).siblings().css({'color':'#ffffff'});
    $('.navbar .actbg').eq(id).show()
    //耕耘导师导航点击事件
    if(id==1){
    	$('.nav_content').css({'display':'block'})
    	if(bindex == -1){
    		$('.nav_content a').each(function(index){
    			$('.nav_content a').eq(index).css({'color':'#ffffff'})
    		})
    	}else{
    		$('.nav_content a').eq(bindex).css({'color':'#D18324'})
    	}
    }else{
    	$('.nav_content').css({'display':'none'})
    }
//  $('.navbar .nav_b').eq(1).click(function (){
//  	$('.navbar .nav_b').each(function(index){
//  		$('.navbar .nav_b').eq(index).css({'color':'#ffffff'})
//  	})
//  	$('.navbar .actbg').each(function(index){
//  		$('.navbar .actbg').eq(index).hide()
//  	})
//  	$('.navbar .nav_b').eq(1).css({'color':'#D18324'})
//  	$('.navbar .actbg').eq(1).show()
//  	$('.nav_content').css({'display':'block'})
//  	$('.lecture_content').css({'display':'none'})
//  	if(bindex == -1){
//  		$('.nav_content a').each(function(index){
//  			$('.nav_content a').eq(index).css({'color':'#ffffff'})
//  		})
//  	}else{
//  		$('.nav_content a').eq(bindex).css({'color':'#D18324'})
//  	}
//  	
//  })
    //发音讲词导航点击事件
    if(id==3){
    	$('.lecture_content').css({'display':'block'})
    	if(aindex == -1){
    		$('.nav_content a').each(function(index){
    			$('.nav_content a').eq(index).css({'color':'#ffffff'})
    		})
    	}else{
    	$('.lecture_content a').eq(aindex).css({'color':'#D18324'})
    	}
    }else{
    	$('.lecture_content').css({'display':'none'})
    }
//  $('.navbar .nav_b').eq(3).click(function (){
//  	$('.navbar .nav_b').each(function(index){
//  		$('.navbar .nav_b').eq(index).css({'color':'#ffffff'})
//  	})
//  	$('.navbar .actbg').each(function(index){
//  		$('.navbar .actbg').eq(index).hide()
//  	})
//  	$('.navbar .nav_b').eq(3).css({'color':'#D18324'})
//  	$('.navbar .actbg').eq(3).show()
//  	$('.nav_content').css({'display':'none'})
//  	$('.lecture_content').css({'display':'block'})
//  	if(aindex == -1){
//  		$('.nav_content a').each(function(index){
//  			$('.nav_content a').eq(index).css({'color':'#ffffff'})
//  		})
//  	}else{
//  	$('.lecture_content a').eq(aindex).css({'color':'#D18324'})
//  	}
//  })