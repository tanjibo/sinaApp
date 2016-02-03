$(function(){
// 获取地址栏的id
	$.getUrlParam = function(name){
	    var reg = new RegExp("(^|&)"+name +"=([^&]*)(&|$)");
	    var r = window.location.search.substr(1).match(reg);
	    if (r!=null) return unescape(r[2]); return null;
    }

    var Oid = $.getUrlParam('user_id') || 21;
    var page = page || 1;
//食刻
	$.ajax({
		url:'http://fjs.taobaichi.com/index.php/FanApi/MealList/recordList',
		type:'POST',
		dataType:'json',
		data:{ user_id:Oid,p:page},
		success:function(meg){
           if(meg.code!='10091'){
            
			  var html="";
			  $.each(meg.result.list,function(i,index) {
			  	 console.log(index);
			  	html += '<article class="food_r">\
							<p class="time">'+index.create_time+'</p>\
							<dl>\
								<a href="shike_details.html"><dt><img src="images/tp.jpg" /></dt>\
								<dd>'+index.remark+'</dd></a>\
								<dd><p><span class="delete">删除</span><a href="shike_details.html">查看详情</a><b></b></p></dd>\
							</dl>\
						</article>';
                 })
			
			  $('.foodCarving').append(html);
              count();
		}
	  }
	});

//


//食刻详情
var Did = $.getUrlParam('Record_id') || 21;
$.ajax({
		url:'http://fjs.taobaichi.com/index.php/FanApi/MealList/recordDetails',
		type:'POST',
		dataType:'json',
		data:{Record_id:Did},
		success:function(data){
			var html = '';
			html += '<article class="title">';
			html += '<dl>';
			html += '<dt><img src="images/tp.jpg" /></dt>';
			html += '<dd>';
			html += '<h1>疯狂的Cindy</h1>';
			html += '<p><span><img class="set" src="images/set_btn.png" /></span>2016-1-14   星期五  18:22:34</p>';
			html += '</dd>';
			html += '</dl>';
			html += '</article>';
			var content = $('.wrap .food_details').append(html);
		}
	});




  
})

// 食刻列表在底部
function count(){

	 var h=$(window).height();
	 var objH=$('.food_r').outerHeight();
	 var num=Math.floor(h/objH);

	 var l=$('.foodCarving').find('.food_r').length;
	 if(l<=num){
	 	$('.foodCarving').css('paddingTop',h-objH*l);
	 }

}


