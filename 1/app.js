/* 
* @Author: [LDF] <47121862@qq.com>
* @Date:   2015-11-13 20:16:07
* @Last Modified by:   [LDF] <47121862@qq.com>
* @Last Modified time: 2015-12-09 15:11:20
*/


!(function(AG){
    AG.module('APP', [], ['$httpProvider', function($httpProvider){
        // 头部配置  
            $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';  
            $httpProvider.defaults.headers.post['Accept'] = 'application/json, text/javascript, */*; q=0.01';  
            $httpProvider.defaults.headers.post['X-Requested-With'] = 'XMLHttpRequest';  
            /**  
             * 重写angular的param方法，数据序列化
             */  
            var param = function (obj) {  
                var query = '', name, value, fullSubName, subName, subValue, innerObj, i;  
                for (name in obj) {  
                    value = obj[name];  
                    if (value instanceof Array) {  
                        for (i = 0; i < value.length; ++i) {  
                            subValue = value[i];  
                            fullSubName = name + '[' + i + ']';  
                            innerObj = {};  
                            innerObj[fullSubName] = subValue;  
                            query += param(innerObj) + '&';  
                        }  
                    }  
                    else if (value instanceof Object) {  
                        for (subName in value) {  
                            subValue = value[subName];  
                            fullSubName = name + '[' + subName + ']';  
                            innerObj = {};  
                            innerObj[fullSubName] = subValue;  
                            query += param(innerObj) + '&';  
                        }  
                    }  
                    else if (value !== undefined && value !== null)  
                        query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';  
                }  
                return query.length ? query.substr(0, query.length - 1) : query;  
            };  
            // Override $http service's default transformRequest  
            $httpProvider.defaults.transformRequest = [function (data) {  
                return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;  
            }];  
    }]);
})(angular);
