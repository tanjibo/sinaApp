/* 
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-06 11:51:34
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-14 10:10:50
 */
var ser = angular.module('tanService', []);

ser.factory('tipService', function() {

    return function(msg) {
        var str = '<div class="showMsg">' + msg + '</div>';
        $('body').append(str);
        var mt = $('.showMsg').outerWidth();
        var t = $('.showMsg').offset().top;
        $('.showMsg').css({
            marginLeft: -mt / 2
        }).animate({
            top: 0
        }, 1000).delay(3000).animate({
            top: t
        }, 1000, function() {
            $('.showMsg').remove();
        })


    }

})

.factory('AuthService', function($http, $q, SESSION) {

        t = {};

        t.login = function(url, data) {
            var info = t.query(url, data);
            return info;

        }

     
        t.query = function(url, data,method) {
             // 声明延后执行，表示要去监控后面的执行
            var deferred = $q.defer();
          
            $http({    method:method||"POST",
                       url:url,
                       data:data,
                       headers:{ 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'},
                      transformRequest: function(data,headersGetter){
                        return $.param(data)
                      }
                  
                })
                .success(function(data, status, headers, config) {
                     // 声明执行成功，即http请求数据成功，可以返回数据了  
                    deferred.resolve(data);
                })
                .error(function(data, status, headers, config) {
                       // 声明执行失败，即服务器返回错误 
                    deferred.reject(data);
                })
                 // 返回承诺，这里并不是最终数据，而是访问最终数据的API
            return deferred.promise;

        }
        return t;
    })
    .service('SESSION', function() {
        this.create = function(data) {
            this.uid = data.uid;
        }
        return this;
    })

// ser.constant('AUTH_EVENTS',{
//  'loginSuccess':'auth-login-success', //登陆成功
//  'loginFailed':'auth-login-failed', //登陆失败
//  'logoutSuccess':"auth-logout-success", //退出成功
//  'sessionTimeout':'auth-session-timeout', //session 过期
//  'notAuthenticated':'auth-not-authenticated', //没有授权
//  'notAuthorized':'auth-not-authorized', 
// })
// .constant('USER_ROLES',{
//   all:'*',
//   admin:'admin',
//   editor:'editor',
//   guest:'guest',
// })

// .factory('AuthService',function($http,Session){
//  var authService={};

//  authService.login=function(credentials){
//    return $http
//      .post('',credentials)
//      .then(function(res){
//        Session.create(res.data.id,res.data.user.id,res.data.user.role);
//        return res.data.user;
//      })
//  }


//   authService.isAuthenticated=function(){
//    return !!Session.userId;
//   }

//   authService.isAuthorized = function (authorizedRoles) {
//     if (!angular.isArray(authorizedRoles)) {
//       authorizedRoles = [authorizedRoles];
//     }
//     return (authService.isAuthenticated() &&authorizedRoles.indexOf(Session.userRole) !== -1);
//   };
//    return authService;
// })

// .service('Session', function () {
//   this.create = function (sessionId, userId, userRole) {
//     this.id = sessionId;
//     this.userId = userId;
//     this.userRole = userRole;
//   };
//   this.destroy = function () {
//     this.id = null;
//     this.userId = null;
//     this.userRole = null;
//   };
//   return this;
// })

// .config(function ($httpProvider) {
//   $httpProvider.interceptors.push([
//     '$injector',
//     function ($injector) {
//       return $injector.get('AuthInterceptor');
//     }
//   ]);
// })
// .factory('AuthInterceptor', function ($rootScope, $q,AUTH_EVENTS) {
//   return {
//     responseError: function (response) { 
//       $rootScope.$broadcast({
//         401: AUTH_EVENTS.notAuthenticated,
//         403: AUTH_EVENTS.notAuthorized,
//         419: AUTH_EVENTS.sessionTimeout,
//         440: AUTH_EVENTS.sessionTimeout
//       }[response.status], response);
//       return $q.reject(response);
//     }
//   };
// })
