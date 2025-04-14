<?php

use App\Controllers\AuthController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('', ['filter' => 'guest'], function ($routes){
    $routes->post('/login-proses', 'AuthController::loginProses');
    $routes->post('/register-proses', 'AuthController::registerProses');
    $routes->get('/', 'AuthController::login');
    $routes->get('/register', 'AuthController::register');
});

$routes->group('', ['filter' => 'authToken'], function ($routes) {
    $routes->get('/logout', 'AuthController::logout');
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/dashboard/history-transaction', 'DashboardController::history_transaction');
    $routes->get('/dashboard/balance', 'DashboardController::balance_index');
    $routes->get('/dashboard/transaction', 'DashboardController::transaction_index');
    $routes->get('/dashboard/setting-profile', 'DashboardController::profile_index');
    $routes->post('/dashboard/topup-processing', 'DashboardController::process_topup');
    $routes->post('/dashboard/update-profile', 'DashboardController::update_profile');
    $routes->post('/dashboard/transaction-process', 'DashboardController::transaction_process');
});
