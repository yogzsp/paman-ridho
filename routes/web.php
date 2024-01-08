<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\viewWeb;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [viewWeb::class,"showWeb"])->name("main-content");

// Auth
Route::get('/login', [AuthController::class,"showLogin"])->name("login-page");
Route::get('/signup',[AuthController::class,"showSignup"])->name("signup-page");
Route::post('/signup',[AuthController::class,"createAccount"])->name("create-account");
Route::post('/login',[AuthController::class,"login"])->name("login");

// Dashboard
Route::get('/dashboard',[DashboardControllers::class,"showDashboard"])->name("home-dashboard");
Route::post('/dashboard/up/menu',[DashboardControllers::class,"addKategori"])->name("tambah-kategori");
Route::get('/dashboard/items/{id}',[DashboardControllers::class,"showListItem"])->name("list-items");
Route::post('/dashboard/up/item', [DashboardControllers::class,"addItem"])->name("tambah-item");
Route::get('/dashboard/del/menu/{id}',[DashboardControllers::class,"delKategori"])->name("del-cat");
Route::get('/dashboard/del/item/{id}',[DashboardControllers::class,"delItem"])->name('del-item');