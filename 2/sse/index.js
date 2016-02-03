/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-27 10:17:56
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-27 11:10:55
*/
var source=null;
function init(args){
	source=new EventSource('http://localhost/sinaApp/2/sse/data.php');
	source.onopen=function(e){
		 // console.log(e);
	 }
	source.addEventListener('message', function(e){
		console.log('ee');
	})
 

	source.onerror=function(){
   
	}
}

init();