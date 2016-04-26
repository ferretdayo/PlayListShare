'use strict';


angular.module('publicApp')
	.directive("loginNav", function(){
		return {
			restrict : "E",
			templateUrl : "views/navigation.html"
		}
	});