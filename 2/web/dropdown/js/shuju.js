$(function(){
	$.ajax({
		url:'http://fjs.taobaichi.com/index.php/FanApi/MealList/recordDetails',
		type:'POST',
		dataType:'json',
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