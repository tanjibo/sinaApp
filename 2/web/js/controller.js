/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-06 11:51:24
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-06 14:31:31
*/
var app=angular.module('tanCtrl',[]);
app.controller('LoginController', function ($scope, $rootScope, AUTH_EVENTS, AuthService) {
  $scope.credentials = {
    username: '',
    password: ''
  };
  $scope.login = function (credentials) {
    AuthService.login(credentials).then(function (user) {
      $rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
      $scope.setCurrentUser(user);
    }, function () {
      $rootScope.$broadcast(AUTH_EVENTS.loginFailed);
    });
  };javascript:void(0);
})

.controller('ApplicationController', function ($scope,USER_ROLES,AuthService) {
  $scope.currentUser = null;
  $scope.userRoles = USER_ROLES;
  $scope.isAuthorized = AuthService.isAuthorized;

  $scope.setCurrentUser = function (user) {
    $scope.currentUser = user;
  };
})