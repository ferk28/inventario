
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function () {
    Route::resource('areas','AreaController');
    Route::resource('bosses','BossController');
    Route::resource('employees','EmployeeController');
    Route::resource('safeguards','SafeguardController');
    Route::resource('series','SafeguardController');


    Route::resource('inventories','InventoryController');

    Route::get('/safeguards/pdf/{id}', 'SafeguardController@PDFgenerator');

    /*        Route::resources([
            'areas' => AreaController::class,
            'bosses' => BossController::class,
            'employees' => EmployeeController::class,
            'inventories' => InventoryController::class,
            'safeguards' => SafeguardController::class,
        ]);*/
});


