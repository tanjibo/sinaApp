/* 
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-28 10:36:10
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-28 11:03:41
 */


/**
 * 惰性函数
 */
function createXHR() {
    var xhr = null;
    if (typeof XMLHttpRequest != 'undefined') {
        xhr = new XMLHttpRequest();
        createXHR = function() {
            return new XMLHttpRequest();
        }
    } else {
        try {
            xhr = new ActiveXObject('Msxml2.XMLHTTP');
            createXHR = function() {
                return new ActiveXObject('Msxml2.XMLHTTP');
            }
        } catch (e) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
                createXHR = function() {
                    return new ActiveXObject('Microsoft.XMLHTTP');
                } catch (e) {
                    createXHR = function() {
                        return null;
                    }
                }
            }
        }
    }
    return xhr;
}


/**
 * 科里化

 */
function curry(fn){
	var args=Array.prototype.slice.call(arguments,1);
	return function (){
		var innerArgs=Array.prototype.slice.call(arguments);
		var finalArgs=args.concat(innerArgs);
		return fn.apply(this.finalArgs);
	}
}

function add(num1,num2,num3){
	return num1+num2+num3;
}
var t=curry(add,50)(1,3);
