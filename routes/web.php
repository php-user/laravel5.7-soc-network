<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/locale/{name}', 'LocaleController@index')->name('locale');

Route::get('/search', 'SearchController@index')->name('search');

Route::group(['middleware' => ['auth', 'web', 'revalidate']], function () {
	Route::get('/friend',                 'FriendController@index')->name('friends');
	Route::get('/find-friends',           'FriendController@findFriends')->name('findFriends');
	Route::get('/friend-requests',        'FriendController@requests')->name('requests');
	Route::get('/friends/add/{user}',     'FriendController@add')->name('friends.add');
	Route::get('/friends/accept/{user}',  'FriendController@accept')->name('friends.accept');
	Route::post('/friends/delete/{user}', 'FriendController@delete')->name('friends.delete');
	
	Route::resource('/profile',        'ProfileController');
	Route::get('/profile/{id}/{slug}', 'ProfileController@getWithSlug')->name('getWithSlug');

	Route::get('/gallery/{id}/{slug}',  'GalleryController@index')->name('gallery');
	Route::get('/gallery/get/all/{id}', 'GalleryController@all')->name('gallery.all');
	Route::post('/gallery/add',         'GalleryController@add')->name('gallery.add');
	Route::post('/gallery/delete',      'GalleryController@delete')->name('gallery.delete');

    Route::get('/statuses',                   'StatusController@index')->name('statuses');
	Route::post('/statuses',                  'StatusController@postStatus')->name('post.status');
	Route::post('/statuses/{statusId}/reply', 'StatusController@postReply')->name('status.reply');
	Route::get('/statuses/{statusId}/like',   'StatusController@getLike')->name('status.like');
	Route::get('/statuses/{id}/{slug}',       'StatusController@getStatus')->name('get.status');

	Route::get('/search/{id}/{slug}', 'SearchController@selectedUser');
});

Route::group(['middleware' => ['auth', 'admin', 'web', 'revalidate']], function () {
	Route::get('/admin', 'Admin\AdminController@index')->name('admin');

	Route::get('/admin/favicon',        'Admin\FaviconController@index')->name('admin.favicon');
	Route::post('/admin/favicon/store', 'Admin\FaviconController@store')->name('admin.favicon.store');

	Route::get('/admin/role-user',                'Admin\UserRoleController@index')->name('admin.role.user');
	Route::get('/admin/role-user/edit/{user}',    'Admin\UserRoleController@edit')->name('admin.role.user.edit');
	Route::put('/admin/role-user/update/{user}',  'Admin\UserRoleController@update')->name('admin.role.user.update');
	Route::post('/admin/role-user/delete/{user}', 'Admin\UserRoleController@delete')->name('admin.role.user.delete');

	Route::get('/admin/role-admin',                 'Admin\AdminRoleController@index')->name('admin.role.admin');
	Route::get('/admin/role-admin/edit/{admin}',    'Admin\AdminRoleController@edit')->name('admin.role.admin.edit');
	Route::put('/admin/role-admin/update/{admin}',  'Admin\AdminRoleController@update')->name('admin.role.admin.update');

	Route::get('/admin/forbidden-words',      'Admin\ForbiddenWordsController@index')->name('admin.forbidden.words');
	Route::post('/admin/forbidden-words/add', 'Admin\ForbiddenWordsController@add')->name('admin.forbidden.words.add');

	Route::get('/admin/statuses',                'Admin\StatusController@index')->name('admin.statuses');
	Route::get('/admin/status/{id}',             'Admin\StatusController@view')->name('admin.status.view');
	Route::post('/admin/status/delete/{status}', 'Admin\StatusController@delete')->name('admin.status.delete');
});
