<?php

return [

	/*
	|--------------------------------------------------------------------------
	| API
	|--------------------------------------------------------------------------
	|
	| Information used to connect to the API
	|
	*/

	'api' => [

		'redirect_uri'	=> 'http://loc.red.it/auth',
		'auth_duration'	=> 'permanent',
		'client_id'		=> 'OMFVgsuPWGI4Bg',
		'host' 			=> 'http://www.reddit.com',
		'secret'		=> 'sQSal1bqi0cJNWI6uR5KtOIEeU4',
		'user_agent'	=> 'www:red.it:v0.5 (by /u/simuse)',

		'endpoint' 		=> [
			'authorize' => 'https://ssl.reddit.com/api/v1/authorize',
			'revoke' 	=> 'https://ssl.reddit.com/api/v1/revoke_token',
			'token'		=> 'https://ssl.reddit.com/api/v1/access_token',
		],

		'scope'			=> [
			'edit',
			'flair',
			'history',
			'identity',
			'mysubreddits',
			'privatemessages',
			'read',
			'report',
			'save',
			'submit',
			'subscribe',
			'vote',
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Autocompeter API
	|--------------------------------------------------------------------------
	|
	| https://autocompeter.com
	|
	*/

	'autocompeter' => [

		'domain' => 'loc.red.it',
		'key'	 => 'fwFUBMue5t5bp6mo9wHb63KZ',

	],

	/*
	|--------------------------------------------------------------------------
	| Defaults
	|--------------------------------------------------------------------------
	|
	| Default app options
	|
	*/

	'defaults' => [

		'limit'		=> 50,
		'sort'		=> 'hot',
		'subreddit'	=> 'all',

		'suggested'	=> [
			'askreddit',
			'catgifs',
			'earthporn',
			'funny',
			'iama',
			'showerthoughts',
			'videos',
			'worldnews',
		],

		'sortBy' => [
			'hot',
			'top',
			'new',
			'rising',
			'controversial',
		],

		'sortSince' => [
			'all',
			'hour',
			'day',
			'week',
			'month',
			'year',
		],

		'sortComments' => [
			'top',
			'best',
			'new',
			'hot',
			'controversial',
			'old',
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Formats
	|--------------------------------------------------------------------------
	|
	| Used for checking and formatting posts
	|
	*/

	'regex' => [
		'bandcamp' 	 => '/bandcamp.com/',
		'gfycat' 	 => '/gfycat.com\/(\w+)/',
		'imgur' 	 => '/imgur.com/',
		'imguralbum' => '/imgur.com\/(?:gallery|a)\/(\w{4,})/',
		'soundcloud' => '/soundcloud.com/',
		'vimeo'		 => '/vimeo.com\/(\d+)($|\/)/',
		'youtube'	 => '/(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/i',
	],

	'formats' => [
		'videoDomains' => [
			'youtube.com',
			'm.youtube.com',
			'youtu.be',
			'vimeo.com',
		],

	],

];



