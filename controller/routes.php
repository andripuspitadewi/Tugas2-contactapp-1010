<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('login', 'get', 'AuthController::login');
Router::url('register', 'get', 'AuthController::register');
Router::url('dashboard', 'get', 'DashboardController::index');
Router::url('dashboard/admin', 'get', 'DashboardController::admin');
Router::url('dashboard/contacts', 'get', 'DashboardController::contacts');
Router::url('dashboard/logout', 'get', 'AuthController::logout');
Router::url('contacts/add', 'get', 'ContactController::add');
Router::url('contacts/edit', 'get', 'ContactController::edit');
Router::url('contacts/remove', 'get', 'ContactController::remove');
Router::url('freshdb', 'get', 'freshdb');
Router::url('report', 'get', 'ContactController::report');

# POST
Router::url('login', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');
Router::url('contacts/add', 'post', 'ContactController::saveAdd');
Router::url('contacts/edit', 'post', 'ContactController::saveEdit');

new Router();