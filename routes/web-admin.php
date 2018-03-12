<?php

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


    Route::prefix('menu')->middleware('auth:admin')->group(function () {


        
        Route::get('/submenu/{menuId}','Admin\MenuController@getSubmenu')->where(['menuId' => '[0-9]+']);
        Route::get('/{slug}/submenu/create','Admin\MenuController@createSubmenu');
        Route::put('/{slug}/submenu/insert','Admin\MenuController@insertSubmenu');
        Route::put('/{slug}/submenu/update/{menuId}','Admin\MenuController@updateSubmenu')->where(['menuId' => '[0-9]+']);
        Route::get('/{slug}/submenu/{menuId}','Admin\MenuController@getSubmenu')->where(['menuId' => '[0-9]+']);
      

        Route::put('/insert','Admin\MenuController@insertMenu');
        Route::get('/{menuId}','Admin\MenuController@getmenu')->where(['menuId' => '[0-9]+']);
        Route::put('/update/{menuId}','Admin\MenuController@updateMenu')->where(['menuId' => '[0-9]+']);


        Route::post('/{slug}/{menuId}','Admin\MenuController@updateMenuTree')->where(['menuId' => '[0-9]+']);
        Route::get('/tree/{slug}','Admin\MenuController@getTree');
        
        

        Route::delete('/delete/{menuId}','Admin\MenuController@deleteMenu');


        Route::get('/{slug}','Admin\MenuController@getListings');
        Route::get('/','Admin\MenuController@getListings');



    });




    Route::prefix('pages')->middleware('auth:admin')->group(function () {


        Route::post('/insert','Admin\PageController@insertPages');
        Route::get('/create','Admin\PageController@createPages');
        Route::get('/edit/{id}','Admin\PageController@getPages');
        Route::post('/update/{id}','Admin\PageController@updatePages');
        Route::delete('/delete/{id}','Admin\PageController@deletePages');
        Route::post('/upload','Admin\PageController@upload');
        Route::get('/get/{id}','Admin\PageController@listPages');
        Route::get('/get','Admin\PageController@listPages');
        Route::any('/','Admin\PageController@getListings');


    });




    Route::prefix('sliders')->middleware('auth:admin')->group(function () {

        Route::post('/insert','Admin\SliderController@insertSliders');
        Route::get('/create','Admin\SliderController@createSliders');
        Route::get('/edit/{id}','Admin\SliderController@getSliders');
        Route::post('/update/{id}','Admin\SliderController@updateSliders');
        Route::delete('/delete/{id}','Admin\SliderController@deleteSliders');
        Route::get('/get/{id}','Admin\SliderController@listSliders');
        Route::get('/get','Admin\SliderController@listSliders');
        Route::any('/','Admin\SliderController@getListings');



        Route::prefix('groups')->middleware('auth:admin')->group(function () {
            
            Route::post('/insert','Admin\SlidergroupController@insertSlidergroup');
            Route::get('/create','Admin\SlidergroupController@createSlidergroup');
            Route::get('/edit/{id}','Admin\SlidergroupController@getSlidergroup');
            Route::post('/update/{id}','Admin\SlidergroupController@updateSlidergroup');
            Route::delete('/delete/{id}','Admin\SlidergroupController@deleteSlidergroup');
            Route::get('/get/{id}','Admin\SlidergroupController@listSlidergroup');
            Route::get('/get','Admin\SlidergroupController@listSlidergroup');
            Route::any('/','Admin\SlidergroupController@getListings');

        });



    });

    Route::middleware('auth:admin')->group(function () {

       Route::resource('sliders/settings', 'Admin\SliderSettingsController',['except' => ['create','update', 'destroy']]);
       Route::resource('settings/global', 'Admin\SettingsController',['except' => ['create','update', 'destroy']]);
    
    });





    Route::get('/logout', 'Auth\AdminLoginController@logout');
    Route::get('/dashboard', 'Admin\AdminController@showDashboard')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

    //Route::get('/reg', 'Auth\AdminRegisterController@create');
    //Route::get('/', 'Admin\AdminController@index');



