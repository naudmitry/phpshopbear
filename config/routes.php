<?php
	return array(
		'product/([0-9]+)' => 'product/view/$1',

		'news/([0-9]+)' => 'news/view/$1', // actionView в NewsController
		'news'=>'news/index', // actionIndex в NewsController
		
		'catalog/page-([0-9]+)' => 'catalog/index/$1', // actionIndex в CatalogController
		
		'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
		'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController

		'cart/checkout' => 'cart/checkout',
		'cart/delete/([0-9]+)' => 'cart/delete/$1',
		'cart/del/([0-9]+)' => 'cart/del/$1',
		'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
		'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
		'cart' => 'cart/index',

		'contact' => 'contact/index', // actionIndex в ContactController

		'user/register' => 'user/register', // actionRegister в UserController

		'user/login' => 'user/login',
		'user/logout' => 'user/logout',

		'cabinet/edit' => 'cabinet/edit',
		'cabinet' => 'cabinet/index',

		'admin/product/create' => 'adminProduct/create',
	    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
	    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
	    'admin/product' => 'adminProduct/index',

		'admin/category/create' => 'adminCategory/create',
	    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
	    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
	    'admin/category' => 'adminCategory/index',

	    'admin/user/create' => 'adminUser/create',
	    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
	    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
	    'admin/user' => 'adminUser/index',

	    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
	    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
	    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
	    'admin/order' => 'adminOrder/index',

	    'admin/tidings/create' => 'adminTidings/create',
	    'admin/tidings/update/([0-9]+)' => 'adminTidings/update/$1',
	    'admin/tidings/delete/([0-9]+)' => 'adminTidings/delete/$1',
	    'admin/tidings' => 'adminTidings/index',

		'admin'=>'admin/index',
		
		'' => 'site/index',
	);
?>