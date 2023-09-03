<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers\User');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');






/** Admin Routes **/

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], static function ($routes) {

    $routes->get('login', 'Auth::index');
    
    $routes->post('login', 'Auth::login');

    $routes->get('forgot/password', 'Auth::forgot_password');

    $routes->post('forgot/password', 'Auth::send_forgot_password_link');

    $routes->get('reset/password/(:any)', 'Auth::reset_password/$1');

    $routes->post('reset/password/(:any)', 'Auth::set_new_password/$1');





});


/** Admin Authenticate Routes **/

    $routes->group('admin',['namespace' => 'App\Controllers\Admin','filter' => 'auth'], static function ($routes) {

    $routes->get('dashboard', 'Dashboard::index');

    $routes->get('roles', 'Roles::index');

    $routes->get('create/role', 'Roles::create');

    $routes->post('save/role', 'Roles::store');

    $routes->get('edit/(:num)/role', 'Roles::edit/$1');

    $routes->post('update/(:num)/role', 'Roles::update/$1');

    $routes->post('delete/(:num)/role', 'Roles::delete/$1');









    $routes->get('logout', 'Auth::logout');


});


/** End Admin Routes **/




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
