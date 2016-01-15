/* 
* @Author: [谈际波] <1533954229@qq.com>
* @Date:   2016-01-06 11:51:34
* @Last Modified by:   [谈际波] <1533954229@qq.com>
* @Last Modified time: 2016-01-07 15:53:26
*/
var ser=angular.module('tanService',[]);

ser.constant('AUTH_EVENTS',{
	'loginSuccess':'auth-login-success', //登陆成功
	'loginFailed':'auth-login-failed', //登陆失败
	'logoutSuccess':"auth-logout-success", //退出成功
	'sessionTimeout':'auth-session-timeout', //session 过期
	'notAuthenticated':'auth-not-authenticated', //没有授权
	'notAuthorized':'auth-not-authorized', 
})
.constant('USER_ROLES',{
	 all:'*',
	 admin:'admin',
	 editor:'editor',
	 guest:'guest',
})
.value('realname','zhaoliu')

.factory('AuthService',function($http,Session){
	var authService={};

	authService.login=function(credentials){
		return $http.post('/login',credentials).then(function(res){
	    	Session.create(res.data.id,res.data.user.id,res.data.user.role);
	    	return res.data.user;
	    })
	}
	

	 authService.isAuthenticated=function(){
	 	return !!Session.userId;
	 }

	 authService.isAuthorized = function (authorizedRoles) {
    if (!angular.isArray(authorizedRoles)) {
      authorizedRoles = [authorizedRoles];
    }
    return (authService.isAuthenticated() &&authorizedRoles.indexOf(Session.userRole) !== -1);
  };
   return authService;
})
.service('Session', function () {
  this.create = function (sessionId, userId, userRole) {
    this.id = sessionId;
    this.userId = userId;
    this.userRole = userRole;
  };
  this.destroy = function () {
    this.id = null;
    this.userId = null;
    this.userRole = null;
  };
  return this;
})

.config(function ($httpProvider) {
  $httpProvider.interceptors.push(['$injector',function ($injector) {
      return $injector.get('AuthInterceptor');
    }
  ]);
})
.factory('AuthInterceptor', function ($rootScope, $q,AUTH_EVENTS) {
  return {
    responseError: function (response) { 
      $rootScope.$broadcast({
        401: AUTH_EVENTS.notAuthenticated,
        403: AUTH_EVENTS.notAuthorized,
        419: AUTH_EVENTS.sessionTimeout,
        440: AUTH_EVENTS.sessionTimeout
      }[response.status], response);
      return $q.reject(response);
    }
  };
})