<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/maintenance-roles', 'Roles_maintenance::index');
$routes->add('/maintenance-roles-add', 'Roles_maintenance::save');
$routes->add('/maintenance-roles-edit', 'Roles_maintenance::update');
$routes->add('/maintenance-roles-delete/(:num)', 'Roles_maintenance::delete/$1');

$routes->get('/maintenance-users', 'Users_maintenance::index');
$routes->add('/maintenance-users-add', 'Users_maintenance::save');
$routes->add('/maintenance-users-edit', 'Users_maintenance::update');
$routes->add('/maintenance-users-delete/(:num)', 'Users_maintenance::delete/$1');

$routes->get('/maintenance-members', 'Members_maintenance::index');
$routes->add('/maintenance-members-add', 'Members_maintenance::save');
$routes->add('/maintenance-members-edit', 'Members_maintenance::update');
$routes->add('/maintenance-members-delete/(:num)', 'Members_maintenance::delete/$1');

$routes->get('/maintenance-products', 'Products_maintenance::index');
$routes->add('/maintenance-products-add', 'Products_maintenance::save');
$routes->add('/maintenance-products-edit', 'Products_maintenance::update');
$routes->add('/maintenance-products-delete/(:num)', 'Products_maintenance::delete/$1');

$routes->get('/inquiry-users', 'Users_inquiry::index');
$routes->get('/inquiry-members', 'Members_inquiry::index');
$routes->get('/inquiry-products', 'Products_inquiry::index');

$routes->get('/transaction-users', 'Users_transactions::index');
$routes->get('/transaction-members', 'Members_transactions::index');
$routes->get('/transaction-products', 'Products_transactions::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
