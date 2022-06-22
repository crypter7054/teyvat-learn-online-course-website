<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Investor::index');
$routes->get('/', 'Home::index');

// routes home

// routes courses
$routes->get('/course', 'Course::index');
$routes->get('/course/savePay/(:num)', 'Course::savePay/$1');
$routes->get('/course/back', 'Course::back');
$routes->get('/detail/(:num)', 'Course::detail/$1');
$routes->get('/detail/payment/(:num)', 'Course::payment/$1');
$routes->get('/detail/payment/checkout/(:num)', 'Course::checkout/$1');

// routes about
$routes->get('/about', 'About::index');

// routes contact
$routes->get('/contact', 'Contact::index');

// routes user
$routes->get('/register', 'User::register');
$routes->get('/login', 'User::login');
$routes->get('/user/save/(:num)', 'User::save/$1');
$routes->post('/user/process', 'User::process');
$routes->get('/user/logout', 'User::logout');
$routes->get('/user/profile/(:num)', 'User::displayProfile/$1');
$routes->get('/user/profile/detail/(:num)', 'Course::detail/$1');
$routes->get('/detail/profile/(:num)', 'User::displayProfile/$1');
$routes->get('/user/storePhoto', 'User::storePhoto');

// routes profile
$routes->get('/profile', 'Mahasiswa::displayProfile');
$routes->get('dosen/profile_dosen/(:num)', 'Dosen::displayProfile/$1');

// routes admin
$routes->get('/admin', 'Admin::login');
$routes->get('/admin/home', 'Admin::index');
$routes->get('/admin/login_admin', 'Admin::login');
$routes->get('/admin/process_admin', 'Admin::process_admin');
$routes->get('/admin/create', 'Admin::create');
$routes->get('/admin/account', 'Admin::account');
$routes->get('/admin/save/(:num)', 'Admin::save/$1');
$routes->get('/delete/(:num)', 'Admin::delete/$1');
$routes->get('/update/(:num)', 'Admin::update/$1');
$routes->get('/admin/logout', 'Admin::logout');
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
