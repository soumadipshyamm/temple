<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;


/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ajax routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "ajax" middleware group. Make something great!
|
*/
Route:: as ('ajax.')->middleware(['auth'])->group(function () {
    Route::controller(AjaxController::class)->group(function () {
        Route::group(['as' => 'get.'], function () {
            Route::get('/getTemple/{uuid}', 'getTemple')->name('temple');
            Route::get('/getPuja/{uuid}', 'getPuja')->name('puja');
            Route::get('/getSliderImgTemple/{uuid}', 'getSliderImgTemple')->name('slider_Img');
            Route::get('/getBanner/{uuid}', 'getBanner')->name('banner');
            Route::get('/getLiveStrimeng/{uuid}', 'getLiveStrimeng')->name('live_strimeng');
            Route::get('/getSpecialEvents/{uuid}', 'getSpecialEvents')->name('special_events');
            Route::get('/getSocialServices/{uuid}', 'getSocialServices')->name('social_services');
            Route::get('/getRelevantWebsite/{uuid}', 'getRelevantWebsite')->name('relavent_website');
            Route::get('/getDonation/{uuid}', 'getDonation')->name('donation');
            Route::get('/getAliedServices/{uuid}', 'getAliedServices')->name('alied_services');
            Route::get('/getNews/{uuid}', 'getNews')->name('news');
            Route::get('/getFestivals/{uuid}', 'getFestivals')->name('festival');
        });

        Route::group(['as' => 'update.'], function () {
            Route::match(['put', 'post'], '/updateStatus', 'setStatus')->name('status');
            // Route::match(['put', 'post'], '/update/settings', 'updateSettings')->name('settings');
        });

        Route::group(['as' => 'delete.'], function () {
            Route::delete('/deleteData', 'deleteData')->name('data');
        });
    });
});
