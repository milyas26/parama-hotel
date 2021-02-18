<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

// =========================================
// DASHBOARD ADMIN
// =========================================
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/dashboard', function () {
        return view('dashboard.pages.index');
    });

    Route::resource('/news', 'App\Http\Controllers\NewsController');
    Route::resource('/youtube', 'App\Http\Controllers\YoutubeController');
    Route::resource('/announcement', 'App\Http\Controllers\AnnouncementController');
    Route::resource('/user', 'App\Http\Controllers\UserController');

    // -- Section Contact --
    Route::get('/cms/contact', 'App\Http\Controllers\CMSController@contact')->name('contact.index');
    Route::get('/cms/contact/create', 'App\Http\Controllers\CMSController@createContact')->name('contact.create');
    Route::post('/cms/contact/create', 'App\Http\Controllers\CMSController@storeContact')->name('contact.store');
    Route::get('/cms/contact/{contact}/update', 'App\Http\Controllers\CMSController@editContact')->name('contact.edit');
    Route::put('/cms/contact/{contact}/update', 'App\Http\Controllers\CMSController@updateContact')->name('contact.update');
    Route::delete('/cms/contact/{contact}/destroy', 'App\Http\Controllers\CMSController@destroyContact')->name('contact.destroy');

    // -- Section Header --
    Route::get('/cms/header', 'App\Http\Controllers\CMSController@header')->name('header.index');
    Route::get('/cms/header/create', 'App\Http\Controllers\CMSController@createHeader')->name('header.create');
    Route::post('/cms/header/create', 'App\Http\Controllers\CMSController@storeHeader')->name('header.store');
    Route::get('/cms/header/{header}/update', 'App\Http\Controllers\CMSController@editHeader')->name('header.edit');
    Route::put('/cms/header/{header}/update', 'App\Http\Controllers\CMSController@updateHeader')->name('header.update');
    Route::delete('/cms/header/{header}/destroy', 'App\Http\Controllers\CMSController@destroyHeader')->name('header.destroy');

     // -- Section Service --
    Route::get('/cms/service', 'App\Http\Controllers\CMSController@service')->name('service.index');
    Route::get('/cms/service/create', 'App\Http\Controllers\CMSController@createService')->name('service.create');
    Route::post('/cms/service/create', 'App\Http\Controllers\CMSController@storeService')->name('service.store');
    Route::get('/cms/service/{service}/update', 'App\Http\Controllers\CMSController@editService')->name('service.edit');
    Route::put('/cms/service/{service}/update', 'App\Http\Controllers\CMSController@updateService')->name('service.update');
    Route::delete('/cms/service/{service}/destroy', 'App\Http\Controllers\CMSController@destroyService')->name('service.destroy');

    // -- Section About --
    Route::get('/cms/about', 'App\Http\Controllers\CMSController@about')->name('about.index');
    Route::get('/cms/about/create', 'App\Http\Controllers\CMSController@createAbout')->name('about.create');
    Route::post('/cms/about/create', 'App\Http\Controllers\CMSController@storeAbout')->name('about.store');
    Route::get('/cms/about/{about}/update', 'App\Http\Controllers\CMSController@editAbout')->name('about.edit');
    Route::put('/cms/about/{about}/update', 'App\Http\Controllers\CMSController@updateAbout')->name('about.update');
    Route::delete('/cms/about/{about}/destroy', 'App\Http\Controllers\CMSController@destroyAbout')->name('about.destroy');

    // -- Section Info --
    Route::get('/cms/info', 'App\Http\Controllers\CMSController@info')->name('info.index');
    Route::get('/cms/info/create', 'App\Http\Controllers\CMSController@createInfo')->name('info.create');
    Route::post('/cms/info/create', 'App\Http\Controllers\CMSController@storeInfo')->name('info.store');
    Route::get('/cms/info/{info}/update', 'App\Http\Controllers\CMSController@editInfo')->name('info.edit');
    Route::put('/cms/info/{info}/update', 'App\Http\Controllers\CMSController@updateInfo')->name('info.update');
    Route::delete('/cms/info/{info}/destroy', 'App\Http\Controllers\CMSController@destroyInfo')->name('info.destroy');

    // Section Product (Type Unit)
    // -- Section Info --
    Route::get('/cms/unit', 'App\Http\Controllers\CMSController@unit')->name('unit.index');
    Route::get('/cms/unit/create', 'App\Http\Controllers\CMSController@createUnit')->name('unit.create');
    Route::post('/cms/unit/create', 'App\Http\Controllers\CMSController@storeUnit')->name('unit.store');
    Route::get('/cms/unit/{unit}/update', 'App\Http\Controllers\CMSController@editUnit')->name('unit.edit');
    Route::put('/cms/unit/{unit}/update', 'App\Http\Controllers\CMSController@updateUnit')->name('unit.update');
    Route::delete('/cms/unit/{unit}/destroy', 'App\Http\Controllers\CMSController@destroyUnit')->name('unit.destroy');

    // Section Facilities
    Route::get('/cms/facilities', 'App\Http\Controllers\CMSController@facilities')->name('facilities.index');
    Route::get('/cms/facilities/create', 'App\Http\Controllers\CMSController@createFacilities')->name('facilities.create');
    Route::post('/cms/facilities/create', 'App\Http\Controllers\CMSController@storeFacilities')->name('facilities.store');
    Route::get('/cms/facilities/{facilities}/update', 'App\Http\Controllers\CMSController@editFacilities')->name('facilities.edit');
    Route::put('/cms/facilities/{facilities}/update', 'App\Http\Controllers\CMSController@updateFacilities')->name('facilities.update');
    Route::delete('/cms/facilities/{facilities}/destroy', 'App\Http\Controllers\CMSController@destroyFacilities')->name('facilities.destroy');

    // Section Gallery
    Route::get('/cms/gallery', 'App\Http\Controllers\CMSController@gallery')->name('gallery.index');
    Route::get('/cms/gallery/create', 'App\Http\Controllers\CMSController@createGallery')->name('gallery.create');
    Route::post('/cms/gallery/create', 'App\Http\Controllers\CMSController@storeGallery')->name('gallery.store');
    Route::get('/cms/gallery/{gallery}/update', 'App\Http\Controllers\CMSController@editGallery')->name('gallery.edit');
    Route::put('/cms/gallery/{gallery}/update', 'App\Http\Controllers\CMSController@updateGallery')->name('gallery.update');
    Route::delete('/cms/gallery/{gallery}/destroy', 'App\Http\Controllers\CMSController@destroyGallery')->name('gallery.destroy');
});

// =========================================
// VIEW FRONTEND
// =========================================
Route::get('/', function () {
    $news       = \App\Models\News::orderBy('created_at','desc')->take(3)->get();
    $service    = \App\Models\Service::all();
    $about      = \App\Models\About::first();
    $info       = \App\Models\Info::all();
    $header     = \App\Models\Header::first();
    $youtube    = \App\Models\Youtube::first();
    $gallery    = \App\Models\Gallery::where('category','=','gallery')->take(6)->get();
    $youtube_all    = \App\Models\Youtube::all()->take(6);

    return view('frontend.index', compact(['news','service','about','info','header','gallery','youtube','youtube_all']));
});

Route::get('/units', function () {
    return view('frontend.units');
});

Route::get('/facilities', function () {
    $facilities = \App\Models\Facilities::with('gallery')->get();
    return view('frontend.facilities', compact('facilities'));
});

Route::get('/information', function () {
    $news       = \App\Models\News::all();
    return view('frontend.information', compact('news'));
});
Route::get('/detail-news/{id}', function ($id) {
    $news       = \App\Models\News::findorfail($id);
    $allNews       = \App\Models\News::orderBy('created_at','desc')->take(4)->get();
    return view('frontend.detail_news', compact('news', 'allNews'));
});

Route::get('/gallery', function () {
    $youtube    = \App\Models\Youtube::all();
    $gallery    = \App\Models\Gallery::all();
    return view('frontend.gallery', compact(['youtube', 'gallery']));
});

Route::get('/gallery-detail/{id}', function ($id) {
    $youtube    = \App\Models\Youtube::findorfail($id);

    return view('frontend.gallery_detail', compact('youtube'));
});

Route::get('/about', function () {
    $service    = \App\Models\Service::all();
    $about      = \App\Models\About::first();
    $info       = \App\Models\Info::all();
    $youtube    = \App\Models\Youtube::first();
    return view('frontend.about', compact(['service','about','info', 'youtube']));
});

Route::get('/contact-us', function () {
    $contact = \App\Models\Contact::first();
    return view('frontend.contact-us', compact('contact'));
});