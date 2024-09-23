<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AhmedController;
use App\Http\Controllers\BullController;
use App\Http\Controllers\ArcController;
use App\Http\Controllers\BullDetaliesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProdutesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReportsController;
use App\Models\bull_detalies;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{page}', 'AhmedController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('bull',BullController::class );
Route::resource('sections',SectionsController::class );
Route::resource('Produtes',ProdutesController::class );
Route::get('section/{id}',[BullController::class,'pluck']);
Route::get('bulldetalies/{id}',[BullDetaliesController::class,'index']);
Route::get('edit_invoice/{id}',[BullDetaliesController::class,'edit'])->name('edit');
Route::get('show_invoice/{id}',[BullDetaliesController::class,'show'])->name('show');
Route::get('status_show/{id}',[BullController::class,'show'])->name('status_show');
Route::post('status_update/{id}',[BullController::class,'status_update'])->name('status_update');
// Route::get('softDeletes/{id}',[BullController::class,'softDeletes'])->name('softDeletes');
Route::delete('softDeletes/{id}', [BullController::class, 'softDeletes'])->name('softDeletes');
// Route::delete('bull.destroy/{id}', [BullController::class, 'destroy'])->name('bull.destroy');

Route::get('arc',[ArcController::class,'index'])->name('arc');
Route::get('paidbull',[BullController::class,'paidbull'])->name('paidbull');
Route::get('inpaidbull', [BullController::class, 'inpaidbull'])->name('inpaidbull');
Route::get('printbull/{id}', [BullController::class, 'printbull'])->name('printbull');
Route::get('users',[UserController::class,'index'])->name('users');
Route::get('roles',[RoleController::class,'index'])->name('roles')->middleware('RoleMiddleware');
Route::get('reports',[ReportsController::class,'index'])->name('reports');
Route::POST('report',[ReportsController::class,'report'])->name('report');
Route::get('creports',[ReportsController::class,'cindex'])->name('creports');
Route::POST('creport',[ReportsController::class,'creport'])->name('creport');
Route::get('/create-roles', [RoleController::class, 'createRolesAndPermissions']);

// Route::post('index',[SectionController::class] ,'index')->name('index');
// Route::post('store',[SectionController::class] ,'store')->name('store');
// Route::post('update{id}',[SectionController::class ,"update"])->name('update');
// Route::get('delete{id}',[SectionController::class] ,'destroy')->name('delete');
// Route::delete('destroy',[SectionController::class ],"destroy")->name('destroy');
// Route::delete('sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');




Route::get('/{page}',[AhmedController::class ,'index']);