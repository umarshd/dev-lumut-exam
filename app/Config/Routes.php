<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::Login');

$routes->post('/proses/login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

$routes->group('admin', ['filter => authAdminFilter'], function ($routes) {

    $routes->get('post', 'Admin\Post::index');
    $routes->get('post/tambah', 'Admin\Post::tmbah');
    $routes->post('post/proses/tambah', 'Admin\Post::prosesTambah');
    $routes->get('post/edit/(:segment)', 'Admin\Post::edit/$1');
    $routes->post('post/edit/proses', 'Admin\Post::prosesEdit/$1');
    $routes->get('post/delete/(:segment)', 'Admin\Post::delete/$1');

    $routes->get('account', 'Admin\Account::index');
    $routes->get('account/tambah', 'Admin\Account::tmbah');
    $routes->post('account/proses/tambah', 'Admin\Account::prosesTambah');
    $routes->get('account/edit/(:segment)', 'Admin\Account::edit/$1');
    $routes->post('account/edit/proses', 'Admin\Account::prosesEdit/$1');
    $routes->get('account/delete/(:segment)', 'Admin\Account::delete/$1');

});