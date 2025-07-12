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
$routes->post('login', 'Home::login');     


//This is for register
 $routes->setDefaultNamespace('App\Controllers');
$routes->get('register', 'Signup::index'); 
$routes->post('signup/register', 'Signup::register');

$routes->get('/dashboard', 'Dashboard::dashboard');

//for post

$routes->get('post', 'PostController::index');
$routes->get('/post/manage', 'PostController::manage');
$routes->get('post/postList', 'PostController::postList');
$routes->get('/post/show', 'PostController::show'); 
$routes->post('post/save', 'PostController::save'); 
$routes->get('post/view/(:num)', 'PostController::view/$1');
$routes->delete('post/delete/(:num)', 'PostController::delete/$1');

$routes->get('/post/fetchAll', 'PostController::fetchAll');   
$routes->get('/post/get/(:num)', 'PostController::getPost/$1'); 
$routes->post('/post/update', 'PostController::update'); 
$routes->get('post/fetchPublishedPosts', 'PostController::fetchPublishedPosts');
$routes->get('/post/postShow/(:num)', 'PostController::postShow/$1'); 
