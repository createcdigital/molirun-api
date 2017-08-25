<?php

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

$app->post('user/add', 'RacerController@add');
$app->get('user/id/{card_number}', 'RacerController@getByCardNumber');

$app->get('stock/get', 'StockController@get');

$app->get('coupon/verify/{code}', 'CouponController@getCouponByCode');

$app->post('wxpay/callback', 'WXPayController@notify');

$app->get('/', function(){
    return view('api-example');
});
$app->get('api/example', function(){
    return view('api-example');
});