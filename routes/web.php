<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Models\Relationship;
use App\Models\Respondent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'index'])->name('login');

Route::prefix('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/{uuid}/profile', [ClientController::class, 'show'])->name('client.show');
    Route::get('/{uuid}/profile/cases', [ClientController::class, 'showCases'])->name('client.show.cases');
    Route::get('/{uuid}/profile/respondents', [ClientController::class, 'showRespondents'])->name('client.show.respondents');
    Route::get('/{uuid}/profile/dependents', [ClientController::class, 'showDependents'])->name('client.show.dependents');
    Route::post('/check', [ClientController::class, 'showByFullname'])->name('client.check');
    Route::post('/', [ClientController::class, 'store'])->name('client.store');
    Route::post('/respondent', [ClientController::class, 'storeRespondent'])->name('client.store.respondent');
    Route::post('/search', [ClientController::class, 'search'])->name('client.search');
});

Route::prefix('child')->group(function () {
    Route::post('/', [ChildController::class, 'store'])->name('child.store');
});
