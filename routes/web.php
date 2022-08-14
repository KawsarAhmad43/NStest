<?php

use App\Http\Controllers\CandidateController;
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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/candidate', function(){
    return view('candidate.index');
});




    // Category Route...
    Route::name('candidate.')->prefix('candidate')->group(function() {
        Route::get('/', [CandidateController::class, 'index'])->name('index');
        Route::post('store', [CandidateController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CandidateController::class, 'edit'])->name('edit');
        Route::put('update', [CandidateController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CandidateController::class, 'destroy'])->name('destroy');
    });
