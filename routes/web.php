<?php

use App\Models\Participant;
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
    return view('start');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    
    Route::get('/shuffle/{id}', function ($id) {
        $participants = Participant::where('group_id',$id)->get();
        return view('shuffle',compact('participants'));
    });

    Route::resources([
        'names' => 'App\Http\Controllers\NameController',
        'groups' => 'App\Http\Controllers\GroupController',
    ]);
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
