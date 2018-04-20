<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->post('/upload','UploadController@upload');
    $router->resource('article_type', 'ArticleTypeController');
    $router->resource('articles', 'ArticleController');
    $router->resource('carousel', 'CarouselController');
    $router->resource('book_type', 'BookTypeController');
    $router->resource('books', 'BooksController');
    $router->resource('member','MemberController');
});
