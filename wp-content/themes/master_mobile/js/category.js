	 let total = Number(document.getElementById("total").innerHTML);
	let strurl = window.location.pathname; 
	let sid = getId() 
    strurl = strurl.substring(strurl.lastIndexOf('/') + 1, strurl.length);
    var pagingDivInnerHTML = "";
    if(total>10){
      pagingConstruct(sid);	
    }else{
    	paging(sid)
    }
    
    //页数小于10 展示页
     function paging(paging){
		//从第1页读到第40页。
        for (var i = 1; i <= total; i++) {
        	let num = (i)>9?(i):'0'+(i)
			//如果读到当前页，就仅仅加载一个文本，不放链接
            if (i == paging) {
                pagingDivInnerHTML += `<a class='show'  href="javascript:void(0)">
                ${num}
	        	<button class="pagingred"></button>
	        </a>`;
            }
            else {
               pagingDivInnerHTML += "<a class='show' href='javascript:void(0)' onclick='go( "+i+",`${strurl}` ,`${total}`)'>" + num + "</a>";
                    
            }
        }
		//把构造的内容放上去pagingDiv
        document.getElementById("pagingDiv").innerHTML = pagingDivInnerHTML;
       }
     //展示页
    function pagingConstruct(paging){
		//这里是加载省略号的flag
        var isHiddenExist = 0;
		//从第1页读到第40页。
        for (var i = 1; i <= total; i++) {
        	let num = (i)>9?(i):'0'+(i)
			//如果读到当前页，就仅仅加载一个文本，不放链接
            if (i == paging) {
                pagingDivInnerHTML += `<a href="javascript:void(0)">
	        	<button class="pagingred"></button>
	        	${num}
	        </a>`;
            }
            else {
				//如果是页首，中间页，页尾，当前页的前后三页则不省略。
                if (i < 4 || i < (paging + 2) && i > (paging - 2) || i > (total - 3)) {
                	
                	console.log(strurl)
                    pagingDivInnerHTML += "<a href='javascript:void(0)' onclick='go( "+i+",`${strurl}` ,`${total}`)'>" + num + "</a>";
                    isHiddenExist = 0;
                }
				//否则就构造...
                else {
                    if (isHiddenExist == 0) {
                        pagingDivInnerHTML += `<span style='font-size:0.24rem'>...</span>`;
                        isHiddenExist = 1;
                    }
                }
            }
        }
		//把构造的内容放上去pagingDiv
        document.getElementById("pagingDiv").innerHTML = pagingDivInnerHTML;
       }