<?php

use App\Http\Controllers\AlliedServicesController;
use App\Http\Controllers\LiveStreamingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PujaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ExploerController;
use App\Http\Controllers\FestivalsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RelevantWebsiteController;
use App\Http\Controllers\SocialServicesController;
use App\Http\Controllers\SpecialEventController;
use App\Http\Controllers\TempleController;
use App\Http\Controllers\TestController;
use App\Models\Donation;
use App\Models\LiveStreaming;
use App\Models\SocialServices;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/download', function () {
    return view('app');
});
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(HomeController::class)->prefix('dashboard')->as('dashboard.')->group(function () {
        // Route::get('logout','logout')->name('logout');
        Route::get('/', 'index')->name('list');
        Route::POST('password-update', 'passwordUpdate')->name('passwordUpdate');
    });

    Route::controller(TempleController::class)->prefix('temple')->as('temple.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-temple', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
        Route::get('/slider-img/{uuid}', 'sliderImg')->name('sliderImg');
        Route::post('/add-slider-img/', 'addSliderImg')->name('addSliderImg');
        Route::get('/darshan-time/{uuid}', 'darshanTime')->name('darshanTime');
        Route::post('/add-darshan-time/', 'addDarshanTime')->name('addDarshanTime');
        Route::get('/view-details/{uuid}', 'viewDetails')->name('viewDetails');

    });
    Route::controller(BannerController::class)->prefix('banner')->as('banner.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-banner', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });

    Route::controller(PujaController::class)->prefix('puja')->as('puja.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-puja', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(EventController::class)->prefix('event')->as('event.')->group(function () {
        Route::get('/', 'index')->name('list');
        // Route::post('/add-temple', 'add')->name('add');
        // Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(TestController::class)->prefix('test')->as('test.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-test', 'add')->name('add');
        // Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(LiveStreamingController::class)->prefix('streaming')->as('streaming.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-live-stremming', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(SpecialEventController::class)->prefix('specialEvent')->as('specialEvent.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-special-event', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(SocialServicesController::class)->prefix('socialServices')->as('socialServices.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-social-services', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(RelevantWebsiteController::class)->prefix('relevantWebsite')->as('relevantWebsite.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-relevant-website', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(DonationController::class)->prefix('donation')->as('donation.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-donation', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(NewsController::class)->prefix('news')->as('news.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-news', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(AlliedServicesController::class)->prefix('alliedServices')->as('alliedServices.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-allied-services', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(ExploerController::class)->prefix('exploer')->as('exploer.')->group(function () {
        Route::get('/', 'index')->name('list');
        // Route::post('/add-allied-services', 'add')->name('add');
        // Route::post('/edit/{uuid}', 'edit')->name('edit');
    });
    Route::controller(FestivalsController::class)->prefix('festival')->as('festival.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/add-festival', 'add')->name('add');
        Route::post('/edit/{uuid}', 'edit')->name('edit');
    });

    Route::post('api/fetch-states', [BaseController::class, 'fetchState']);
    Route::post('api/fetch-cities', [BaseController::class, 'fetchCity']);
});
