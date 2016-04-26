'use strict';

/**
 * @ngdoc overview
 * @name publicApp
 * @description
 * # publicApp
 *
 * Main module of the application.
 */
angular
	.module('publicApp', [
		'ngAnimate',
		'ngCookies',
		'ngResource',
		'ngSanitize',
		'ngRoute',
		'ngTouch',
		'ui.router',
	])
	.config(function($urlRouterProvider){
		$urlRouterProvider
			.otherwise('/');
	})
	.config(function($stateProvider){
		$stateProvider
			/* 非ログインユーザ */
			.state('main', {
				url : '/',
				templateUrl : './views/main.html',
				controller : 'MainCtrl'
			})
			/* 非ログインユーザ */
			.state('music_list', {
				url : '/music',
				templateUrl : './views/music_list.html',
				controller : 'MusiclistCtrl'
			})
			/* ここからログインユーザ */
			/* マイページ */
			.state('mypage', {
				url : '/mypage',
				templateUrl : './views/mypage.html',
				controller : 'MypageCtrl'
			})
			.state('myplaylist', {
				url : '/mypage/myplaylist',
				templateUrl : './views/myplaylist.html',
				controller : 'MyplaylistCtrl'
			})
			.state('favoriteplaylist', {
				url : '/mypage/favoriteplaylist',
				templateUrl : './views/favoriteplaylist.html',
				controller : 'FavoriteplaylistCtrl'
			})
			/* 曲やプレイリストの検索するページ */
			.state('music_search', {
				url : '/mypage/music_search',
				templateUrl : './views/music_search.html',
				controller : 'MusicsearchCtrl'
			})
			/* ユーザーページの表示 */
			.state('user_info', {
				url : '/mypage/user_info',
				templateUrl : './views/user_info.html',
				controller : 'UserInfoCtrl'
			});
	});