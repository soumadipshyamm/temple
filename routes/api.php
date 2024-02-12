<?php

use App\Http\Controllers\Api\TempleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::controller(TempleController::class)->prefix('temple')->as('temple.')->group(function () {
    Route::post('/temple',[TempleController::class,'temple']);
    Route::post('/darshan',[TempleController::class,'darshan']);
    Route::post('/slider',[TempleController::class,'slider']);
    Route::post('/banner',[TempleController::class,'banner']);
    Route::post('/explore-puja',[TempleController::class,'explorePuja']);
    Route::post('/live-strimming',[TempleController::class,'liveStrimming']);
    Route::post('/puja',[TempleController::class,'puja']);
    Route::post('/upcomming-puja',[TempleController::class,'upCommingPuja']);
    Route::post('/special-event',[TempleController::class,'specialEvent']);
    Route::post('/search-city',[TempleController::class,'searchCity']);
    Route::post('/searching-temple',[TempleController::class,'searchingTemple']);
    Route::post('/searching-temple-location',[TempleController::class,'searchingTempleLocation']);
    Route::post('/temple-social-services',[TempleController::class,'socialServices']);
    Route::post('/temple-relevant-website',[TempleController::class,'relevantWebsite']);
    Route::post('/temple-donation',[TempleController::class,'donation']);
    Route::post('/temple-news',[TempleController::class,'news']);
    Route::post('/temple-allied-services',[TempleController::class,'alliedServices']);
    Route::post('/temple-festival',[TempleController::class,'festival']);
// });

