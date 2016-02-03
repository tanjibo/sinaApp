/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-28 11:37:25
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-28 16:40:40
*/


/**
 * 级联函数
 */
function classA(){
	this.a='';
	this.b="";
	this.c="";
}

classA.prototype={
	setA:function(){
		this.a='aaaaa';
		return this;
	},
	setB:function(){
		this.b="bbbbb";
		return this;
	},
  setC:function(){
   this.c='cccc';
   return this;
  }
}

var person=new classA();
person.setA().setB().setC();
console.log(person);