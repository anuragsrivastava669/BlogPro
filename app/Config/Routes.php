<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//this is for login 
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->post('loginUser', 'Home::loginUser');
$routes->get('logout', 'Home::logout');
$routes->post('login', 'Home::login');         // Handles form POST
// $routes->get('login', 'Home::showLogin');   

// $routes->get('index', 'signup::index');
// $routes->post('register', 'signup::register');
// $routes->get('login', 'Auth::login');
// $routes->post('loginUser', 'Auth::loginUser');
// $routes->get('logout', 'Auth::logout');
//This is for register
$routes->setDefaultNamespace('App\Controllers');
$routes->get('register', 'Signup::index'); // THIS is what fixes your error!
$routes->post('signup/register', 'Signup::register');

