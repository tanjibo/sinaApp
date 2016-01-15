/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2015-12-16 11:56:54
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2015-12-16 13:38:07
*/

'use strict';

var app=angular.module('tanApp',['ui.router','beginCtrls']);

app.config(function($stateProvider,$urlRouterProvider){

	$urlRouterProvider.otherwise('/index');

	$stateProvider.
	state('index',{
		url:'/index',
	  templateUrl:'begin_angular_tpls/begin_angular_tpls.html',
		// template:'<div>fsdfsd</div>',
		 controller:'begin_angular_ctrl',
	})

});
