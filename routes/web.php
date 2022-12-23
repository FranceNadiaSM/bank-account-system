<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DetailsServicesController;
use App\Http\Controllers\HomeController;

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


Route::get('/account/index' , [AccountController::class,'index']);//listar todos
Route::get('/account/new' , [AccountController::class,'create']);
Route::post('/account/new' , [AccountController::class,'store'])->name('insert_account');//cadastrar
Route::get('/account/view/{id}' , [AccountController::class,'show']);//listar por id
Route::get('/account/list/edit' , [AccountController::class,'show_edit']);//listar para atualizar
Route::get('/account/edit/{id}' , [AccountController::class,'edit']);
Route::post('/account/edit/{id}' , [AccountController::class,'update'])->name('edit_account');//atualizar
Route::get('/account/list/delete' , [AccountController::class,'show_delete']);//listar para deletar
Route::get('/account/delete/{id}' , [AccountController::class,'delete']);
Route::post('/account/delete/{id}' , [AccountController::class,'destroy'])->name('delete_account');//delete

Route::get('/services/balance',[ServicesController::class, 'show_balance']);//saldo
Route::post('/services/balance',[ServicesController::class, 'display_balance'])->name('balance');//saldo
Route::get('/services/deposit' , [ServicesController::class,'show_deposit']);//depósito
Route::post('/services/deposit' , [ServicesController::class,'deposit'])->name('deposit');//depósito
Route::get('/services/retrait' , [ServicesController::class,'show_retrait']);//saque
Route::post('/services/retrait' , [ServicesController::class,'retrait'])->name('retrait');//saque

//relatórios
Route::get('/services/rel',[DetailsServicesController::class, 'show_rel_services']);//saldo
Route::post('/services/period', [DetailsServicesController::class,'period'])->name('rel_services');//seleciona período
Route::post('/services/period/{id}', [DetailsServicesController::class,'download'])->name('period');//mostra relatório


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
