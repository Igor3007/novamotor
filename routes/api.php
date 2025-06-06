<?php

use Illuminate\Support\Facades\Route;

Route::post('/form-answer/fast', [\App\Http\Controllers\FormAnswerController::class, 'storeFastForm'])
    ->name('fast-answer-form');
Route::post('/form-answer/call', [\App\Http\Controllers\FormAnswerController::class, 'storeCallForm'])
    ->name('call-answer-form');
Route::post('/form-answer/contacts', [\App\Http\Controllers\FormAnswerController::class, 'storeContactsForm'])
    ->name('contacts-form');

