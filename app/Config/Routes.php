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

    // Roles Routes

   // $routes->get('roles', 'Roles::index',['filter' => 'permission:roles.read']);

    $routes->get('roles', 'Roles::index');


    $routes->get('create/role', 'Roles::create');

    $routes->post('save/role', 'Roles::store');

    $routes->get('edit/(:num)/role', 'Roles::edit/$1');

    $routes->post('update/(:num)/role', 'Roles::update/$1');

    $routes->post('delete/(:num)/role', 'Roles::delete/$1');

    $routes->post('search/user', 'User::search');

    $routes->post('attach/user_role', 'Roles::attach');

    $routes->post('detach/user_role', 'Roles::detach');

    // End Roles Routes

    // Customer Routes

    $routes->get('customers', 'Customer::index');


    $routes->get('customers/create', 'Customer::create');

    $routes->post('customers/store', 'Customer::store');

    $routes->get('customers/(:num)/view', 'Customer::view/$1');



    $routes->get('customers/(:num)/edit', 'Customer::edit/$1');

    $routes->post('customers/(:num)/update', 'Customer::update/$1');

    $routes->post('customers/(:num)/delete', 'Customer::delete/$1');

    $routes->post('customers/(:num)/change/status', 'Customer::status/$1');

    $routes->post('customers/upload/licence/(:any)/(:num)','Customer::upload/$1/$2');

   
  // Customer Vehicles //

       $routes->get('customers/(:num)/vehicles/create', 'CustomerVehicle::create/$1');

    $routes->post('customers/(:num)/vehicles/store', 'CustomerVehicle::store/$1');

    $routes->get('customers/(:num)/vehicles/view', 'CustomerVehicle::view/$1');

    $routes->get('customers/(:num)/vehicles/(:num)/gallery', 'CustomerVehicle::gallery/$1/$2');

    $routes->post('customers/(:num)/vehicles/(:num)/gallery/upload', 'CustomerVehicle::upload/$1/$2');




    $routes->get('customers/(:num)/vehicles/(:num)/edit', 'CustomerVehicle::edit/$1/$2');

    $routes->post('customers/(:num)/vehicles/(:num)/update', 'CustomerVehicle::update/$1/$2');

    $routes->post('customers/(:num)/vehicles/(:num)/delete', 'CustomerVehicle::delete/$1/$2');

    $routes->post('customers/(:num)/vehicles/(:num)/change/status', 'CustomerVehicle::status/$1/$2');

    // End Customer Vehicles //


    // Customer Drivers

      $routes->get('customers/(:num)/drivers/create', 'CustomerDriver::create/$1');

    $routes->post('customers/(:num)/drivers/store', 'CustomerDriver::store/$1');

    $routes->get('customers/(:num)/drivers/view', 'CustomerDriver::view/$1');

    $routes->get('customers/(:num)/drivers/(:num)/edit', 'CustomerDriver::edit/$1/$2');

    $routes->post('customers/(:num)/drivers/(:num)/update', 'CustomerDriver::update/$1/$2');

    $routes->post('customers/(:num)/drivers/(:num)/delete', 'CustomerDriver::delete/$1/$2');

    $routes->post('customers/(:num)/drivers/(:num)/change/status', 'CustomerDriver::status/$1/$2');



    // End Customer Drivers


    // End Customer Routes


    // Media Route

    $routes->post('media/file/(:num)/delete','Media::delete/$1');

    $routes->post('media/file/(:num)/change/status','Media::status/$1');




    // End Media Routes


    // Setting Routes
   

   // state
    $routes->get('settings/states','State::index');
    $routes->post('settings/states','State::index');
    $routes->post('settings/states/store','State::store');

    $routes->post('settings/states/(:num)/change/status', 'State::status/$1');
    $routes->post('settings/states/(:num)/delete', 'State::delete/$1');

   // vehicle body types

    $routes->get('settings/vehicle/bodytypes','VehicleBodyType::index');
    $routes->post('settings/vehicle/bodytypes','VehicleBodyType::index');
    $routes->post('settings/vehicle/bodytypes/store','VehicleBodyType::store');

    $routes->post('settings/vehicle/bodytypes/(:num)/change/status', 'VehicleBodyType::status/$1');
    $routes->post('settings/vehicle/bodytypes/(:num)/delete', 'VehicleBodyType::delete/$1');

    // tax types

    $routes->get('settings/taxes','TaxType::index');
    $routes->post('settings/taxes','TaxType::index');
    $routes->post('settings/taxes/store','TaxType::store');

    $routes->post('settings/taxes/(:num)/change/status', 'TaxType::status/$1');
    $routes->post('settings/taxes/(:num)/delete', 'TaxType::delete/$1');

    // Fare Types

      $routes->get('settings/fare/types','FareType::index');
    $routes->post('settings/fare/types','FareType::index');
    $routes->post('settings/fare/types/store','FareType::store');

    $routes->post('settings/fare/types/(:num)/change/status', 'TaxType::status/$1');
    $routes->post('settings/fare/types/(:num)/delete', 'FareType::delete/$1');








    //End Settings Routes

    // Bookings Routes
    $routes->get('bookings', 'Booking::index');
    $routes->post('bookings', 'Booking::index');
    $routes->post('bookings/(:num)/delete', 'Booking::delete/$1');

    $routes->get('bookings/create', 'Booking::create');

    $routes->post('bookings/store', 'Booking::store');

    $routes->get('bookings/(:num)/view', 'Booking::view/$1');



    $routes->get('bookings/(:num)/edit', 'Booking::edit/$1');

    $routes->post('bookings/(:num)/update', 'Booking::update/$1');





    // End Bookinks


    // Vechile Routes

    $routes->post('vehicles/search/list', 'Vehicle::list');


    


    // End Vehicle Routes


    // Vechile Routes

    $routes->post('drivers/search/list', 'Driver::list');


    


    // End Vehicle Routes


    // User Routes

    $routes->post('users/check/user', 'User::check');



    // End User Routes


    // Company Routes

     

    $routes->get('companies', 'Company::index');

    $routes->post('companies/search/list', 'Company::list');



    $routes->get('companies/create', 'Company::create');

    $routes->post('companies/store', 'Company::store');

    $routes->get('companies/(:num)/view', 'Company::view/$1');



    $routes->get('companies/(:num)/edit', 'Company::edit/$1');

    $routes->post('companies/(:num)/update', 'Company::update/$1');

    $routes->post('companies/(:num)/delete', 'Company::delete/$1');

    $routes->post('companies/(:num)/change/status', 'Company::status/$1');


    // Company Employees

      $routes->get('companies/(:num)/employees/create', 'CompanyEmployee::create/$1');

    $routes->post('companies/(:num)/employees/store', 'CompanyEmployee::store/$1');

    $routes->get('companies/(:num)/employees', 'CompanyEmployee::index/$1');


    $routes->get('companies/(:num)/employees/view', 'CompanyEmployee::view/$1');

    $routes->get('companies/(:num)/employees/(:num)/edit', 'CompanyEmployee::edit/$1/$2');

    $routes->post('companies/(:num)/employees/(:num)/update', 'CompanyEmployee::update/$1/$2');

    $routes->post('companies/(:num)/employees/(:num)/delete', 'CompanyEmployee::delete/$1/$2');

    $routes->post('companies/(:num)/employees/(:num)/change/status', 'CompanyEmployee::status/$1/$2');

    $routes->post('companies/(:num)/employees/search/list', 'CompanyEmployee::list/$1');


   



    // End Company Employees


    // End Company Routes


    













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
