<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/footer'], function (Router $router) {
    $router->bind('footer', function ($id) {
        return app('Modules\Footer\Repositories\FooterRepository')->find($id);
    });
    $router->get('footers', [
        'as' => 'admin.footer.footer.index',
        'uses' => 'FooterController@index',
        'middleware' => 'can:footer.footers.index'
    ]);
    $router->get('footers/create', [
        'as' => 'admin.footer.footer.create',
        'uses' => 'FooterController@create',
        'middleware' => 'can:footer.footers.create'
    ]);
    $router->post('footers', [
        'as' => 'admin.footer.footer.store',
        'uses' => 'FooterController@store',
        'middleware' => 'can:footer.footers.create'
    ]);
    $router->get('footers/{footer}/edit', [
        'as' => 'admin.footer.footer.edit',
        'uses' => 'FooterController@edit',
        'middleware' => 'can:footer.footers.edit'
    ]);
    $router->put('footers/{footer}', [
        'as' => 'admin.footer.footer.update',
        'uses' => 'FooterController@update',
        'middleware' => 'can:footer.footers.edit'
    ]);
    $router->delete('footers/{footer}', [
        'as' => 'admin.footer.footer.destroy',
        'uses' => 'FooterController@destroy',
        'middleware' => 'can:footer.footers.destroy'
    ]);
// append

});
