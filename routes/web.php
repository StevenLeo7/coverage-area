<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepassController;
use App\Http\Controllers\ChartProvinceController;
use App\Http\Controllers\RequestAreaController;
use App\Http\Controllers\DependenProvincesController;
use App\Http\Controllers\DependenRegenciesController;
use App\Http\Controllers\DependenDistrictsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportCoverageController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/redirect-coverage/{q}', 'App\Http\Controllers\AuthController@postlogin'); //kalau pakai SSO
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['middleware'=>'auth'],function()
{
    // Home
    Route::get('/home', [HomeController::class, 'index'])->middleware(['checkStatus:Admin,Guest']);

    // Search
    Route::resource('/coverage_area', 'App\Http\Controllers\HomepassController')->middleware(['checkStatus:Admin,Guest']);
    Route::get('/coverage_area', [HomepassController::class, 'viewSearch'])->middleware(['checkStatus:Admin,Guest']); 
    Route::get('/coverage_area/ajax/search', [HomepassController::class, 'getAddress'])->name('search')->middleware(['checkStatus:Admin,Guest']);

    // Request Area
    Route::resource('/request_area', 'App\Http\Controllers\RequestAreaController')->middleware(['checkStatus:Admin,Guest']);
    Route::post('/request_area', [RequestAreaController::class, 'index'])->middleware(['checkStatus:Admin,Guest']);
    Route::post('/request_area/create', [RequestAreaController::class, 'store'])->middleware(['checkStatus:Admin,Guest']);

    // Add Coverage Area
    Route::resource('/import_coverage', 'App\Http\Controllers\ImportCoverageController')->middleware(['checkStatus:Admin']);
    Route::post('/import_coverage/insert', [ImportCoverageController::class, 'import'])->middleware(['checkStatus:Admin']);

    // Chart Request
    Route::get('/chart_request', [ChartProvinceController::class, 'index'])->middleware(['checkStatus:Admin,Guest']);
    Route::post('/chart_request', [ChartProvinceController::class, 'index'])->middleware(['checkStatus:Admin,Guest']);

    // Ajax provinsi, kota, kecamatan, kelurahan
    Route::get('/request_area/ajax/{provinces_id}', [DependenProvincesController::class, 'findCity'])->name('regencies')->middleware(['checkStatus:Admin,Guest']);
    Route::get('/request_area/ajax/regen/{regencies_id}', [DependenRegenciesController::class, 'findDistricts'])->name('districts')->middleware(['checkStatus:Admin,Guest']);
    Route::get('/request_area/ajax/districts/villages/{districts_id}', [DependenDistrictsController::class, 'findVillages'])->name('villages')->middleware(['checkStatus:Admin,Guest']);

    // Export
    Route::post('/request_area/export', [ExportController::class, 'export']);

    // Audit Log
    Route::resource('/log', 'App\Http\Controllers\AuditLogController')->middleware(['checkStatus:Admin']);
    Route::post('/Log/audit-log/export', 'App\Http\Controllers\ExportController@exportAuditLog')->middleware(['checkStatus:Admin']);

    // User
    Route::resource('/user', 'App\Http\Controllers\UserController')->middleware(['checkStatus:Admin']);
});

