<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/get', function () use ($router) {
//     return " from get route";
// });

// $router->post('/name/{kamal}/age/{age}', function($kamal,$age){
//     return $kamal.$age;
// });
// $router->post('/name/{helal}/age/{age}/city[/{dhaka}]', function($helal, $age, $dhaka=null){
//     return $helal.$age;
// });
// $router->get('/something/{name}', 'MyController@My');  for response body and header
$router->get('/', 'MyController@MyJson');
$router->get('/first', 'MyController@First');
$router->get('/second', 'MyController@Second');
$router->post('/download', 'MyController@download');
$router->post('/catch', 'MyController@catch');
// $router->get('/details', 'MyController@detailSelect');
// $router->post('/details', 'MyController@detailCreate');

$router->get('/details', 'CrudController@detailSelect');
$router->post('/details', 'CrudController@store');
$router->delete('/details', 'CrudController@detailDelete');

$router->get('/builder', 'BilderController@allowRows');
$router->get('/singlerow', 'BilderController@singleRow');
$router->get('/findRow', 'BilderController@findRow');
$router->get('/pluckRow', 'BilderController@pluckRow'); 
$router->get('/countRow', 'BilderController@countRow');
$router->get('/maxROll', 'BilderController@maxROll');
$router->post('/insertData', 'CrudController@insertData');
$router->put('/updateData', 'CrudController@updateData');
$router->delete('/deleteData', 'CrudController@deleteData');
$router->get('/deleteData', 'CrudController@deleteData');

// $router->get('/slectall', 'DetailsController@selectAll');
$router->get('/slectall', ['middleware'=>'auth', 'uses'=>'DetailsController@selectAll']);

$router->post('/slectbyid', 'DetailsController@selectbyid');
$router->get('/count', 'DetailsController@countRow');
$router->get('/max', 'DetailsController@countMax');
$router->get('/min', 'DetailsController@countMin');
$router->get('/avg', 'DetailsController@countAvg');
$router->get('/sum', 'DetailsController@countSum');
$router->post('/insert', 'DetailsController@isnertRow');
$router->post('/delete', 'DetailsController@deleteRow');
$router->post('/update', 'DetailsController@updateRow');