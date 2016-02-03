/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-28 15:18:19
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-28 15:28:14
*/
//这是一个抽象工厂
var XMLHttpFactory=function(){
};

XMLHttpFactory.prototype={
	//如果真的要调用这个方法会抛出一个错误,他不能被实例化,只能用来派生子类
	createFactory:function(){
		throw new Error('this is an abstract class');
	}
}

var XHRHandler=function(){
	XMLHttpFactory.call(this);
}

XHRHandler.prototype=new XMLHttpFactory();
XHRHandler.prototype.constructor=XHRHandler;
XHRHandler.prototype.createFactory=function(){
	var XMLHttp=null;
	if(window.XMLHttpRequest){
		XMLHttp=new XMLHttpRequest();
	}
	else if(window.ActiveXObject){
		XMLHttp=new ActiveXObeject('Microsoft.XMLHTTP');
	}
	return  XMLHttp;
}
