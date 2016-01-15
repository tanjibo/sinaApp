/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-06 14:15:08
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-13 13:59:27
*/
var app=angular.module('app.directive',[]);

// app.directive('aa',function($interval,$timeout){
//    return {
//       restrict:'AEMC',
//       replace:true,
//       scope:{'message':'@'},
//       transclude:true,
//       template:'<div class="showMsg">{{message}}</div>',
//       link:function(scope,ele,attrs){
//        var mt=ele.outerWidth();
//        var t=ele.offset().top;
//         ele.css({marginLeft:-mt/2}).animate({top:0},1000).delay(3000).animate({top: t},1000,function(){
//           alert(11);
//         })

//       } 
//    }
// })

// app.directive('loginDialog', function (AUTH_EVENTS) {
//   return {
//     restrict: 'A',
//     template: '<div ng-if="visible"\
//                     ng-include="\'login-form.html\'">',
//     link: function (scope) {
//       var showDialog = function () {
//         scope.visible = true;
//       };

//       scope.visible = false;
//       scope.$on(AUTH_EVENTS.notAuthenticated, showDialog);
//       scope.$on(AUTH_EVENTS.sessionTimeout, showDialog)
//     }
//   };
// })