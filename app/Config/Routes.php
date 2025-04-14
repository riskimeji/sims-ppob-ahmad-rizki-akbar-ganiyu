<?php

use App\Controllers\AuthController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/logout', [AuthController::class, 'logout']);
$routes->post('/login-proses', 'AuthController::loginProses');
$routes->post('/register-proses', 'AuthController::registerProses');

$routes->group('', ['filter' => 'authToken'], function ($routes) {
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/dashboard/history-transaction', 'DashboardController::history_transaction');
    $routes->get('/dashboard/balance', 'DashboardController::balance_index');
    $routes->get('/dashboard/transaction', 'DashboardController::transaction_index');
    $routes->get('/dashboard/setting-profile', 'DashboardController::profile_index');
    $routes->post('/dashboard/topup-processing', 'DashboardController::process_topup');
    $routes->post('/dashboard/update-profile', 'DashboardController::update_profile');
    $routes->post('/dashboard/transaction-process', 'DashboardController::transaction_process');
});
