<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);



$routes->get('/teste', 'Teste::index');

$routes->get('/extra', 'Extra::index');

$routes->get('/form_login', 'FormLogin::index');

$routes->get('detalhe_carro/(:num)', 'Detalhe_carro::index/$1');

$routes->get('/pesquisa_carro', 'Pesquisa_carro::index');

$routes->get('carros/search', 'Carros_Search::search');

$routes->get('/login', 'Login::index');
$routes->post('/login_check', 'Login::checkLogin', ['as' => 'login_check']);

$routes->get('/logout', 'Login::logout');
$routes->get('/noaccess', 'Login::logout');

$routes->get('dashboard_admin', 'AdminDashboard::index');

$routes->get('testdrive/agendar/(:num)', 'TestDrive::agendar/$1');
$routes->post('testdrive/enviar', 'TestDrive::enviar');
$routes->get('agendar-test-drive/(:num)', 'TestDrive::agendar/$1');

$routes->get('/admin/test-drives', 'TestDrive::adminIndex', ['as' => 'admin_test_drives']);
$routes->post('admin/testdrives/status/(:num)', 'TestDrive::atualizarStatus/$1');
$routes->post('admin/testdrives/status', 'TestDrive::atualizarStatus');
    

$routes->get('/admin/criar', 'AdminController::criarAdmin');
$routes->post('/admin/criar', 'AdminController::storeAdmin');
$routes->get('/admin/utilizadores', 'AdminController::listarAdmins');
$routes->post('/admin/eliminar', 'AdminController::eliminarAdmin');


//CRUD
$routes->get('/dashboard', 'Cars_Dashboard::index');
$routes->get('/dashboard/create', 'Cars_Dashboard::create');
$routes->post('/dashboard/store', 'Cars_Dashboard::store', ['as' => 'store_admin']);
$routes->get('/dashboard/edit/(:num)', 'Cars_Dashboard::edit/$1');
$routes->post('/dashboard/update/(:num)', 'Cars_Dashboard::update/$1');
$routes->get('/dashboard/delete/(:num)', 'Cars_Dashboard::delete/$1');