/* 
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-06 10:59:47
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-06 14:49:18
 */

'use strict';

var app = angular.module('tan_app', ['ui.router','tanCtrl','tanDirective','tanService']);

app.run(function($rootScope, AUTH_EVENTS, AuthService) {

    $rootScope.$on('$stateChangeStart', function(event,next) {
    	   console.log(next.data);
        var authorizedRoles = next.data.authorizedRoles;
        if (!AuthService.isAuthorized(authorizedRoles)) {
            event.preventDefault();
            if (AuthService.isAuthenticated()) {
                // user is not allowed
                $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
            } else {
                // user is not logged in
                $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
            }
        }
    });
})

app.config(function($stateProvider, $urlRouterProvider,USER_ROLES) {
    $urlRouterProvider.otherwise('/login');

    $stateProvider
    .state('aa',{
    	url:'/aa',
    	'templateUrl':'ddd'
    })
    .state('login', {
        url: '/login',
        templateUrl: 'tpls/login.html',
         data: {
         authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
       }
    })
})
