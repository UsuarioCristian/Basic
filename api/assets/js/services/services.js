'use strict';

// Demonstrate how to register services
// In this case it is a simple value service.
angular.module('app.services', []).
value('version', '0.1')

.factory('ApiEndpointFactory', ['$http','$location', function($http, $location) {
	
	var ApiEndpoint = $location.protocol() + "://" + $location.host() + ":" + $location.port();
	
	return{
		ApiEndpoint : ApiEndpoint
	}	
	
}])

.factory('CountryFactory', ['$http','ApiEndpointFactory', function($http, ApiEndpointFactory) {
	var countries = [];
	return{
		getAllCountries:function(){
			
			$http.get(ApiEndpointFactory.ApiEndpoint +'/basic/web/countries')
			.then(function(response){
				countries = response.data;
			}, function(response){
				/*error*/
			});
		},

		getCountries:function(){
			return countries;
		}
	}
	
}])