<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
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

$routes->group('Login', ['namespaces' => 'App\Controllers'], function ($routes) {
    $routes->get('admin', 'Login::admin');
    $routes->get('admin/logoff', 'Login::admin_logoff');
    $routes->post('admin', 'Login::admin_auth');
});

$routes->group('AdminPanel', ['namespaces' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'AdmController::index');
    $routes->get('murid', 'Murid::index');
    $routes->get('murid/new', 'Murid::new');
    $routes->get('murid/(:num)', 'Murid::edit/$1');
    $routes->post('murid', 'Murid::create');
    $routes->post('murid/(:num)', 'Murid::update/$1');
    $routes->get('murid/delete/(:num)', 'Murid::delete/$1');
    $routes->get('guru', 'Guru::index');
    $routes->get('guru/new', 'Guru::new');
    $routes->get('guru/(:num)', 'Guru::edit/$1');
    $routes->get('guru/delete/(:num)', 'Guru::delete/$1');
    $routes->post('guru', 'Guru::create');
    $routes->post('guru/(:num)', 'Guru::update/$1');
    $routes->get('wali', 'WaliMurid::index');
    $routes->get('wali/new', 'WaliMurid::new');
    $routes->get('wali/(:num)', 'WaliMurid::edit/$1');
    $routes->get('wali/delete/(:num)', 'WaliMurid::delete/$1');
    $routes->post('wali', 'WaliMurid::create');
    $routes->post('wali/(:num)', 'WaliMurid::update/$1');
    $routes->get('kuisoner', 'Kuisoner::index');
    $routes->post('kuisoner', 'Kuisoner::create');
    $routes->get('kuisoner/new', 'Kuisoner::new');
    $routes->get('kuisoner/(:num)', 'Kuisoner::edit/$1');
    $routes->get('kuisoner/delete/(:num)', 'Kuisoner::delete/$1');
    $routes->post('kuisoner/(:num)', 'Kuisoner::update/$1');
});

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