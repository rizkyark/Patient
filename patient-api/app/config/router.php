<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet('/users', 'User::getAllUser');
$router->addGet('/users/detail/{id}', 'User::getUserById');
$router->addPost('/users/create', 'User::createUser');
$router->addPatch('/users/update/{id}', 'User::updateUser');
$router->addDelete('/users/delete/{id}', 'User::deleteUser');

$router->handle($_SERVER['REQUEST_URI']);
