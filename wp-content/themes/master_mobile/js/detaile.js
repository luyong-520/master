
	let totaldetaile = Number(document.getElementById("detailtotal").innerHTML);
	let strurl = window.location.pathname; 
	let did = getId() 
    strurl = strurl.substring(strurl.lastIndexOf('/') + 1, strurl.length);
    var pagingDivInnerHTMLs = "";
     if(totaldetaile>10){
      pagingConstructDeatile(did);	
    }else{
    	pagingDetaile(did)
    }
     //页数小于10 详情页
     function pagingDetaile(paging){
		//从第1页读到第40页。
        for (var i = 1; i <= totaldetaile; i++) {
        	let num = (i)>9?(i):'0'+(i)
			//如果读到当前页，就仅仅加载一个文本，不放链接
            if (i == paging) {
                pagingDivInnerHTMLs += `<a class='show'  href="javascript:void(0)">
                ${num}
	        	<button class="pagingred"></button>
	        </a>`;
            }
            else {
               pagingDivInnerHTMLs += "<a class='show' href='javascript:void(0)' onclick='godetaile( "+i+",`${strurl}` ,`${totaldetaile}`)'>" + num + "</a>";
                    
            }
        }
        document.getElementById("pagingDetaile").innerHTML = pagingDivInnerHTMLs;
       }
     //详情页
    function pagingConstructDeatile(paging){
		//这里是加载省略号的flag
        var isHiddenExist = 0;
		//从第1页读到第40页。
        for (var i = 1; i <= totaldetaile; i++) {
        	let num = (i)>9?(i):'0'+(i)
			//如果读到当前页，就仅仅加载一个文本，不放链接
            if (i == paging) {
                pagingDivInnerHTMLs += `<a href="javascript:void(0)">
	        	<button class="pagingred"></button>
	        	${num}
	        </a>`;
            }
            else {
				//如果是页首，中间页，页尾，当前页的前后三页则不省略。
                if (i < 4 || i < (paging + 2) && i > (paging - 2) || i > (totaldetaile - 3)) {
                    pagingDivInnerHTMLs += "<a href='javascript:void(0)' onclick='godetaile( "+i+",`${strurl}` ,`${totaldetaile}`)'>" + num + "</a>";
                    isHiddenExist = 0;
                }
				//否则就构造...
                else {
                    if (isHiddenExist == 0) {
                        pagingDivInnerHTMLs += `<span style='font-size:0.24rem'>...</span>`;
                        isHiddenExist = 1;
                    }
                }
            }
        }
		//把构造的内容放上去pagingDiv
        document.getElementById("pagingDetaile").innerHTML = pagingDivInnerHTMLs;
       }