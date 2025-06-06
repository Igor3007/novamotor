<?php

use Illuminate\Support\Facades\Route;

Route::prefix('laravel-filemanager')->group(function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/form/call', function(){
    return view('layouts.nova-motors.partials.forms.call',[
        'titleForm'=>'Напишите нам',
        'title'=>'Написать нам'
    ]);
})->name('call-form');

Route::get('/form/consultation', function(){
    return view('layouts.nova-motors.partials.forms.call',[
        'titleForm'=>'Заказать консультацию',
        'title'=>'Заказать консультацию'
    ]);
})->name('consultation-form');

Route::get('/form/order', function(){
    return view('layouts.nova-motors.partials.forms.call',[
        'titleForm'=>'Заказать двигатель',
        'title'=>'Заказать двигатель'
    ]);
})->name('order-form');

Route::get('/search/list', [\App\Http\Controllers\SearchController::class,'list']);
Route::get('/catalog', [\App\Http\Controllers\CatalogController::class,'index'])->name('catalog');
Route::get('/catalog/{slug}', [\App\Http\Controllers\CatalogController::class,'category'])->name('category');
Route::get('/product/{slug}', [\App\Http\Controllers\CatalogController::class,'product'])->name('product');
Route::get('/', [\App\Http\Controllers\PageController::class,'home'])->name('home');
Route::get('/{slug}', [\App\Http\Controllers\PageController::class,'page'])->name('page');
