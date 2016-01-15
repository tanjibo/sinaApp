/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-06 14:15:08
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-06 14:27:58
*/

'use strict';

var app=angular.module('tanDirective',[]);


app.directive('loginDialog', function (AUTH_EVENTS) {
  return {
    restrict: 'A',
    template: '<div ng-if="visible"\
                    ng-include="\'login-form.html\'">',
    link: function (scope) {
      var showDialog = function () {
        scope.visible = true;
      };

      scope.visible = false;
      scope.$on(AUTH_EVENTS.notAuthenticated, showDialog);
      scope.$on(AUTH_EVENTS.sessionTimeout, showDialog)
    }
  };
})