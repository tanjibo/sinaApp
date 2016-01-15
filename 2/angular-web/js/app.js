/* 
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-06 10:59:47
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-13 15:37:48
 */

'use strict';

var app = angular.module('tan_app', ['ui.router','tanCtrl','app.directive','tanService','ngCookies','ngDialog']);

app.run(function($rootScope,$state,$cookieStore,$cookies,AuthService) {
    console.log($cookieStore.get('uid'));
    $rootScope.$on('$stateChangeStart', function(event,next) {
        
         // if(!$cookieStore.get('uid')){
         //      // alert(11);
         //   $state.go('login');

          
         // if(next.name=='login') return;
         // if(!AuthService.isLogin()){
    
         //   $state.go('login');
         // }
       
         // }
    });
})

app.config(function($stateProvider, $urlRouterProvider) {
   // var uid=$cookieStore.get('uid')?'/index':"login";
    
    
    $stateProvider.state('login', {
        url: '/login',
        templateUrl: 'tpls/login.html',
        controller:'LoginCtrl'
    })
   .state('index',{
        url:'/index',
        views:{
            '':{
                templateUrl:'tpls/index.html'
            },
            'main@index':{
                templateUrl:'tpls/main.html',
            },
            'top@index':{
                templateUrl:'tpls/topBanner.html',
            }

        }
    })
   .state('index.about',{
      url:'/about',
      views:{
        "main@index":{
            templateUrl:'tpls/userCtrl.html'
        }
      }
   })
   $urlRouterProvider.otherwise('/login');

})
