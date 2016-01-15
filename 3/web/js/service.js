var ser=angular.module('ser',[]);

// ser.factory('myfactory',function(){
// 	var _artist="ddd";
// 	var service={};
// 	service.getArist=function(){
// 		return _artist;
// 	}
// 	return service;
// })
// ser.service('myfactory',function(){
// 	var _artist='ddddddd';
// 	this.getArist=function(){
// 		return _artist;
// 	}
// })
ser.provider('myService',function(){
	var onconfig="dddd";
	var obj={};

	var make=function(){
		return _finalUrl='aa';
	}
	this.$get=function($http,$q){

		obj.comHttp=function(data,url,method){
			var deferred=$q.defer();
			$http({
				method:'get',
				url:url,
				data:data,
			     })
			.success(function(data){
				deferred.resolve(data);
			})
			.error(function(data){
         deferred.reject('there was an error');
			})
			return deferred.promise;
		}
		obj.config=onconfig;
		return obj;
	}

})