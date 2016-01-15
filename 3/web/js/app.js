
// if(window.localStorage){
//      localStorage.setItem('a',111);
// }else{
//     alert(222);
// }

// var app = angular.module('tanApp', ['ui.router','ctrls','ser']);

// app.run(['$rootScope','myService','$state',function($rootScope,myService,$state){

//     $rootScope.$on('$stateChangeStart',function(event,toState,toParams, fromState, fromParams){
                
//           // if(toState.name=="login") return; //如果进入登录界面则允许
          
    
//     })

// }])

// app.config(['$stateProvider', '$urlRouterProvider',function($stateProvider, $urlRouterProvider) {

//     $urlRouterProvider.otherwise('/login');
//     $stateProvider
//         .state('login', { // 首页
//             url: '/login',
//             templateUrl:'tpls/login.html',
//             controller:'loginCtrl',
//             // views: {
//             //     '': {
//             //         templateUrl: 'tpls/main.html'
//             //     },

//             //     'login@index': {
//             //         templateUrl: 'tpls/login.html',
//             //         controller: 'loginCtrl',
//             //     },

//             // }
//         })
//         .state('index',{
//             url:'/index',
//             views:{
//                 '':{
//                     templateUrl:'tpls/main.html',
//                 },
//                 'top@index':{
//                     templateUrl:'tpls/top.html',
//                 },
//                 'tab@index':{
//                      templateUrl:'tpls/index/index.html',
//                 }
//             }

//         })
//         .state('index.about',{
//             url:'/about',
//             views:{
//                 'tab@index':{
//                      templateUrl:'tpls/index/tab.html'      
//                 }
              
//             }
            
//         })
//         .state('logout',{
//             url:'/logout',
//             controller:'logoutCtrl',
//         })

// }])
// .config(['myServiceProvider',function(myServiceProvider){
//      myServiceProvider.onconfig="afsadfddd";
// }])
