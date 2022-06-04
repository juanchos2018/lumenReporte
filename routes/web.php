<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Events\MessageEvent;

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('/user', 'UserController@store');
$router->get('/user-view/{usuario_id}', 'UserController@View');
$router->post('/login', 'AuthenticateController@Login');
$router->post('/incidence', 'IncidenceController@store');

$router->get('/incidence/{usuario_id}', 'IncidenceController@get');
$router->get('/incidence', 'IncidenceController@getAll');

//$router->post('/incidence', 'IncidenceController@store');
$router->get('/fire', function(){
    event(new MessageEvent);
  //  return 'Fire';
    $obj=array();
    return response()->json(['status' => 200, 'result' => ['user' => $obj]]);
});

