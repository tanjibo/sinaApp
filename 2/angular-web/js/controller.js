/* 
 * @Author: [谈际波] <1533954229@qq.com>
 * @Date:   2016-01-06 11:51:24
 * @Last Modified by:   [谈际波] <1533954229@qq.com>
 * @Last Modified time: 2016-01-14 10:22:32
 */
var app = angular.module('tanCtrl', []);
app.controller('LoginCtrl', function($scope,$state,AuthService,ngDialog) {


     // ngDialog.open({ template: './tpls/topBanner.html' });
     // $scope.isLogin=false;
     // $scope.tip="fsdfs";
     // tipService('用户账号或密码错误');
    $scope.login = function() {
               var data={name:$scope.name,
                         pwd :$scope.pwd,
                         desc:$scope.desc,
                         keywords:$scope.keywords
                  };
        AuthService.login('./admin/index.php/fanApi/login/login',data)
        .then(function(data){
             if(data.status==1){
                // $cookieStore.put('uid',1);
                // $scope.isLogin=true;
                // $scope.tip="登陆密码不正确";  
             	// $state.go('index');
             }else{

             }
        },function(){

        })
    };
})
