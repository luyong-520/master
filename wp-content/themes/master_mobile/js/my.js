
// 获取分页的id
function getId () {
    let id
    if (window.location.search.indexOf('&') > -1) {
        window.location.search.split('&').forEach(val => {
            if (val.indexOf('page') > -1) {
                id = Number(val.split('=')[1])
            };
        });
    } else {
        id = 1
    }
    return id
}
//获取总页数
function getCount () {
    let count
    if (window.location.search.indexOf('&') > -1) {
        window.location.search.split('&').forEach(val => {
            if (val.indexOf('count') > -1) {
                count = Number(val.split('=')[1])
            };
        });
    } else {
        count = 0
    }
    return count
}
// 获取分页时的title
function getTitle () {
    let title
    if (window.location.search.indexOf('&') > -1) {
        window.location.search.split('&').forEach(val => {
            if (val.indexOf('title') > -1) {
                title = val.split('=')[1]
            };
        });
    } else {
        title = window.location.search.split('=')[1]
    }
    return title
}

// 点击数字跳转
function go (id, url,count) {
    window.location.href = `${url}?page=${Number(id)}&count=${count}`
}
function godetaile (id, url,count) {
    let title = getTitle()
    window.location.href = `${url}?title=${title}&page=${Number(id)}&count=${count}`
}
// 点击右箭头翻页
function movenex (params, url) {
    var id,count
	if (window.location.search.indexOf('&') > -1) {
	window.location.search.split('&').forEach(val => {
            if (val.indexOf('page') > -1) {
                id = Number(val.split('=')[1])
            };
            if (val.indexOf('count') > -1) {
                count = Number(val.split('=')[1])
            };
        });
      }else{
      	id = 1;
      	count = 0
      }  
    if (id < params) {
        id++
        window.location.href = `${url}?page=${Number(id)}&count=${count}`
    } else {
        id = params
        return
    }
}
//  点击左箭头翻页
function movepre (url) {
	var id,count
	if (window.location.search.indexOf('&') > -1) {
	window.location.search.split('&').forEach(val => {
            if (val.indexOf('page') > -1) {
                id = Number(val.split('=')[1])
            };
            if (val.indexOf('count') > -1) {
                count = Number(val.split('=')[1])
            };
        });
      }else{
      	id = 1;
      	count = 0
      }  
    if (id > 1) {
        id--
        window.location.href = `${url}?page=${Number(id)}&count=${count}`
    } else {
        id = 1
        return
    }
}
// 导师著作 上一页
function workpre () {
    let page = 0
    let title
    window.location.search.split('&').forEach(val => {
        if (val.indexOf('page') > -1) {
            page = val.split('=')[1]
        };
        if (val.indexOf('count') > -1) {
            count = Number(val.split('=')[1])
        };
        if (val.indexOf('title') > -1) {
            title = val.split('=')[1]
        };
    });
    if (page <= 0) {
    } else {
        page--
        window.location.href = `WorksCatalogone.php?page=${page}&&count=${count}&title=${title}`
    };
}
//   导师著作下一页
function worknext () {
    let page = 0
    let count = 0
    let title
    window.location.search.split('&').forEach(val => {
        if (val.indexOf('page') > -1) {
            page = val.split('=')[1]
        };
        if (val.indexOf('count') > -1) {
            count = Number(val.split('=')[1])
        };
        if (val.indexOf('title') > -1) {
            title = val.split('=')[1]
        };
    });
    if (page >= count - 1) {
        document.getElementById('next').innerHTML = '最后一章'
    } else {
        page++
        window.location.href = `WorksCatalogone.php?page=${page}&&count=${count}&title=${title}`
    };
}
// 详情页 右箭头跳转
function detaileNex (params, url) {
    let id = getId()
    let title = getTitle()
    if (id < params) {
        id++
        window.location.href = `${url}?title=${title}&page=${Number(id)}`
    } else {
        id = params
        return
    }
}
// 详情页 左箭头箭头跳转
function detailePre (url) {
    let id = getId()
    let title = getTitle()
    if (id > 1) {
        id--
        window.location.href = `${url}?title=${title}&page=${Number(id)}`
    } else {
        id = 1
        return
    }
}
// 表单提交方法
function checkForm () {
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;
    let flag = false;
    var reg = /^1[3|4|5|7|8]\d{9}$/;
    if (name) {
        if (reg.test(phone)) {
            flag = true
        } else {
            flag = false
            layer.open({
                content: '手机号码填写有误，请重新填写',
            });
        }
    } else {
        flag = false
        layer.open({
            content: '姓名不能为空，请重新填写',
        });
    }
    if (flag) {
        $.get(`./getform.php?name=${name}&phone=${phone}&message=${message}`, function (result) {
            var res = JSON.parse(result)
            if (res.code == '200') {
                layer.msg(res.msg);
                document.getElementById('name').value = ''
                document.getElementById('phone').value = ''
                document.getElementById('message').value = ''
            } else {
                layer.msg(res.msg);
            }
        })

    }
}  