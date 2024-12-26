<?php

return [
	'resources' => [
		'characters' => ['url' => 'api/characters'], 
	],
	'routes' => [
		// Page routes
		['name' => 'dashboard#page', 'url' => '/', 'verb' => 'GET'],
		['name' => 'characters#downloadPdf', 'url' => '/characters/{id}/download', 'verb' => 'GET'],
		['name' => 'settings#index', 'url' => '/settings', 'verb' => 'GET'],
		['name' => 'settings#create', 'url' => '/settings', 'verb' => 'POST'],
		// Object API routes	
		['name' => 'objects#index', 'url' => 'api/objects/{objectType}', 'verb' => 'GET'],
		['name' => 'objects#create', 'url' => 'api/objects/{objectType}', 'verb' => 'POST'],
		['name' => 'objects#show', 'url' => 'api/objects/{objectType}/{id}', 'verb' => 'GET'],
		['name' => 'objects#update', 'url' => 'api/objects/{objectType}/{id}', 'verb' => 'PUT'],
		['name' => 'objects#delete', 'url' => 'api/objects/{objectType}/{id}', 'verb' => 'DELETE'],
		['name' => 'objects#getAuditTrail', 'url' => 'api/objects/{objectType}/{id}/audit', 'verb' => 'GET'],
		['name' => 'objects#getRelations', 'url' => 'api/objects/{objectType}/{id}/relations', 'verb' => 'GET'],
	],
];
