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

use App\Model\Pages;


if (Schema::hasTable('tbl_pages')) {
    $pages =  Pages::where('status', 'activate')->get();
    foreach($pages as $page){

        $slug  =  $page->slug;
        Route::get($slug, 'Front\PageController@index');

    }
}

Route::get("/", function () {
       return view('welcome');
});



















