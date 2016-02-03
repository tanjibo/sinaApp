$(function(){
//弹框
// window.popup1 = {
// 	alert:function(){
// 		var html = '<div class="tankuang">';
// 		html += '<div class="shanchu">';
// 		html += '<p class="neirong">确定要删除么？</p>';
// 		html +='<p class="btn"><input class="quxiao" type="button" /><input class="queding" type="button" /></p>';
// 		html +='</div>';
// 	}
// }

// window.popup2 = {
// 	alert:function(){
// 		var html = '<div class="tankuang">';
// 		html ='<div class="shezhi">';
// 		html +='<p class="whoSee"><img src="images/skyktb@3x.png" />谁可以看</p>';
// 		html +='<p class="choose"><b class="myself"><img src="images/xz@2x.png" />仅自己</b><b class="others"><img src="images/wxz@2x.png" />他人</b></p>';
// 		html +='<p class="tj"><input type="button" /></p>';
// 		html +='</div>';
// 	}
// }



//关于我们点赞    
$(".zan aside").click(function(){
	var show = $(this).attr('attr');
	if($(this).hasClass('zan_l')){
		if(show==1){
			$(this).find('img').attr('src','images/zan_pressed.png');
			$(this).siblings('aside').find('img').attr('src','images/tucao_normal.png');
			$(this).attr('attr','2');
			$(this).siblings('aside').attr('attr',1);
		}else{	
			$(this).find('img').attr('src','images/zan_normal.png');
			$(this).siblings('aside').find('img').attr('src','images/tucao_normal.png');
			$(this).attr('attr','1');
			$(this).siblings('aside').attr('attr',1);
		}
		
	}else{
		if(show==1){
			$(this).find('img').attr('src','images/tucao_pressed.png');
			$(this).siblings('aside').find('img').attr('src','images/zan_normal.png');
			$(this).attr('attr','2');
			$(this).siblings('aside').attr('attr',1);
		}else{
			$(this).find('img').attr('src','images/tucao_normal.png');
			$(this).siblings('aside').find('img').attr('src','images/zan_normal.png');
			$(this).attr('attr','1');
			$(this).siblings('aside').attr('attr',1);
		}
	}
});


    
//意见反馈输入文字的字数
	    $("#TextArea1").keydown(function(){  
	    	var curLength=$("#TextArea1").val().length;
	        if(curLength>=500){  
	            var num=$("#TextArea1").val().substr(0,499);  
	            $("#TextArea1").val(num);  
	            alert("超过字数限制，多出的字将被截断！" );  
	            //$("#textCount").text(0);
	        }  
	        else{  
	            $("#textCount").text(500-$("#TextArea1").val().length-1)  
	        }  
	    }); 
	    

//意见反馈 提交
	$(document).ready(function(){
	// 获取地址栏的id
		$.getUrlParam = function(name){
		    var reg = new RegExp("(^|&)"+name +"=([^&]*)(&|$)");
		    var r = window.location.search.substr(1).match(reg);
		    if (r!=null) return unescape(r[2]); return null;
	    }


		$(".sub").click(function(){
			var Otxt = $("#TextArea1").val();
			 Oid = $.getUrlParam('user_id');

			$.ajax({
					url:'http://fjs.taobaichi.com/index.php/FanApi/PersonalCenter/feedback',
					type:'POST',
					//data:'content='+Otxt ,
					data:{ content:Otxt,user_id:Oid },
					processDat:false,
					dataType:'json',
					success:function(data){
						if(Otxt == ''){
							alert('内容不能为空');
						}else if(data.code == 10020){
					 		alert('提交成功');
					 	}else{ 
					 		alert(data.message);
					 	}
					}
				})
		})
		
	})

//删除和设置
	$('.delete').click(function(){$('.zhezhao,.tankuang,.shanchu').show();});
	$(".quxiao,.close").click(function(){$('.zhezhao,.tankuang,.shanchu').hide();});

	$(".queding").click(function(){
		$('.zhezhao,.tankuang,.shanchu').hide();
		$('.food_details').hide();
	});


	$('.set').click(function(){$('.zhezhao,.tankuang,.shezhi').show();});
	$('.choose span').click(function(){
		var index = $(this).index();
		$('.choose span').eq(index).addClass('on').siblings().removeClass('on');
	});
	$('.tj').click(function(){
		$('.zhezhao,.tankuang,.shezhi').hide();

	});


}) 

		


























