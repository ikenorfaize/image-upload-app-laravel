<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('home');
});

Route::get('/image', function () {
    // Retrieve the image path from session
    $imagePath = session('imagePath');
    return view('image', ['imagePath' => $imagePath]);
})->name('image');

Route::post('/upload-image', [ImageController::class, 'upload'])->name('image.upload');
