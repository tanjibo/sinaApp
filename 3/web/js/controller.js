var ctrl=angular.module('ctrls',[]);
// run初始化数据,至执行一次
// ctrl.run(['$rootScope',function($rootScope){

/**
 * 刚开始的时候
*/
 	// $rootScope.$on('$stateChangeStart',function(event,toState,toParams,fromState,fromParams){
  //        alert(11);
	// })

// }]);
ctrl.controller('authCtrl',['$scope',function(){

}])

ctrl.controller('loginCtrl',['$scope','$timeout','$state','myService',function($scope,$timeout,$state,myService){

  	// $timeout(function(){
  	// 	$scope.uname="i don't know";
  	// },2000);
  	// setTimeout(function(){
   //     $scope.$apply(function(){
   //     	$scope.uname="i don't know";
   //     })
  	// },2000);
   var data={
    name:$scope.uname,
    pwd:$scope.pwd,
   }
  $scope.save=function(){
   myService.comHttp(data,'../admin/index.php/Api/index').then(function(data){
      
      $state.go('index');
     },function(data){

     }); 
    
  }
   
}])

ctrl.controller('logoutCtrl',function($state){
 $scope.logout=function(){
  $state.go('login');
 }
})