<?php

use App\Http\Controllers\AssistanceLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseLogController;
use App\Http\Controllers\CaseProfileController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RespondentController;
use App\Http\Controllers\UserController;
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
    Route::get('/{uuid}/download', [ClientController::class, 'download'])->name('client.show.download');
    Route::post('/check', [ClientController::class, 'showByFullname'])->name('client.check');
    Route::post('/', [ClientController::class, 'store'])->name('client.store');
    Route::post('/respondent', [ClientController::class, 'storeRespondent'])->name('client.store.respondent');
    Route::post('/case', [ClientController::class, 'storeCase'])->name('client.store.case');
    Route::post('/search', [ClientController::class, 'search'])->name('client.search');
    Route::post('/{uuid}/upload-signature', [ClientController::class, 'upload'])->name('client.upload');
});

Route::prefix('child')->group(function () {
    Route::post('/', [ChildController::class, 'store'])->name('child.store');
});

Route::prefix('case-profiles')->group(function () {
    Route::get('/', [CaseProfileController::class, 'index'])->name('caseprofile.index');
    Route::get('/{uuid}/profile', [CaseProfileController::class, 'show'])->name('caseprofile.show');
    Route::post('/search', [CaseProfileController::class, 'search'])->name('caseprofile.search');
});

Route::prefix('case-logs')->group(function () {
    Route::get('/{uuid}/details', [CaseLogController::class, 'show'])->name('caselog.show');
    Route::post('/', [CaseLogController::class, 'store'])->name('caselog.store');
});

Route::prefix('assistance-logs')->group(function () {
    Route::post('/', [AssistanceLogController::class, 'store'])->name('assistancelogs.store');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/{uuid}/profile', [UserController::class, 'show'])->name('users.show');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::post('/search', [UserController::class, 'search'])->name('users.search');
    Route::put('/{uuid}/update-profile', [UserController::class, 'update'])->name('users.update');
});

Route::prefix('resources')->group(function () {
    Route::get('/', [ResourceController::class, 'index'])->name('resources.index');
});

Route::prefix('respondent')->group(function () {
    Route::get('/{complainantId}', [RespondentController::class, 'show']);
});
