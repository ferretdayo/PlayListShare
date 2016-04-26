'use strict';

/**
 * @ngdoc function
 * @name publicApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the publicApp
 */
angular.module('publicApp')
	.controller('MainCtrl', function ($http) {
		return {
            get: function(){
                return $http.get();
            },
            registration: functon(){
                return $http({
                    method: 'POST',
                    url: '',
                    headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
                    data: $.param()
                });
            }            
        }
	})
    .controller('UserRegistCtrl', function ($http) {
		return {
            registration: functon(){
                return $http({
                    method: 'POST',
                    url: '',
                    headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
                    data: $.param()
                });
            }            
        }
	});