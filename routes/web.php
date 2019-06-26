<?php


use Illuminate\Support\Facades\Hash;
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post(
    'auth/login', 
    [
       'uses' => 'AuthController@authenticate'
    ]
);

$router->post(
    'register', 
    [
        'uses' => 'AuthController@create'
    ]
);

$router->get(
    'hash', 
    function() {
        	//return a random hash of 25 character length
            return Hash::make(str_random(25));
        

});

$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {
        $router->get('hash', function() {
            //return a random hash of 25 character length
            //after verfiying jwt token
            $hash = Hash::make(str_random(25));
            Log::info('Hash Generated :'.$hash);
            return  $hash;
           
        });
    }
);