<?php

use App\Http\Controllers\officier\OfficierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\user\UserInformationsController;
use App\Http\Controllers\user\UserDocumentsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\CivilStatusRequestController;

Route::get('/', function () {
    return view('index');
});





Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
    // Nouvelle route pour la gestion des utilisateurs
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::patch('/users/{user}/role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

Route::prefix('informations')->name('user.informations.')->middleware('auth')->group(function () {

    // Page principale des informations utilisateur
    Route::get('/', [UserInformationsController::class, 'index'])->name('index');

    // Formulaire d’édition d’une section spécifique
    Route::get('{section}/edit', [UserInformationsController::class, 'edit'])->name('edit');

    // Enregistrement d’une nouvelle section
    Route::post('{section}', [UserInformationsController::class, 'store'])->name('store');

    // Mise à jour d’une section existante
    Route::put('{section}', [UserInformationsController::class, 'update'])->name('update');

    // Suppression des données d’une section
    Route::delete('{section}', [UserInformationsController::class, 'destroy'])->name('destroy');


});

Route::get('/officier/home', [OfficierController::class, 'index'])->name('officier.index')->middleware('auth');

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::resource('civil_status_requests', CivilStatusRequestController::class)->except(['edit', 'update']);
    Route::get('civil_status_requests/{civil_status_request}/edit', [CivilStatusRequestController::class, 'edit'])->name('civil_status_requests.edit');
    Route::put('civil_status_requests/{civil_status_request}', [CivilStatusRequestController::class, 'update'])->name('civil_status_requests.update');
    Route::get('civil_status_requests/{civil_status_request}/generate', [CivilStatusRequestController::class, 'generate'])->name('civil_status_requests.generate');
    Route::get('civil_status_requests/{id}/download-pdf', [CivilStatusRequestController::class, 'downloadPdf'])
        ->name('civil_status_requests.downloadPdf');
});

// Routes pour les agents d'état civil
Route::middleware(['auth'])->prefix('officier')->group(
    function () {
        Route::get('/', [OfficierController::class, 'index'])->name('officier.index');
        Route::get('/requests/{id}', [OfficierController::class, 'show'])->name('officier.requests.show');
        Route::put('/requests/{id}/approve', [OfficierController::class, 'approve'])->name('officier.requests.approve');
        Route::put('/requests/{id}/reject', [OfficierController::class, 'reject'])->name('officier.requests.reject');
        Route::get('/requests/{id}/reject', [OfficierController::class, 'showRejectForm'])->name('officier.requests.reject.form');
        Route::get('/requests', [CivilStatusRequestController::class, 'index'])->name('civil_status_requests.index');

        Route::put('documents/{id}/approve', [OfficierController::class, 'approveDocument'])
            ->name('officier.documents.approve');

        Route::put('documents/{id}/reject', [OfficierController::class, 'rejectDocument'])
            ->name('officier.documents.reject');
    }
);

Route::prefix('user/documents')->name('user.documents.')->middleware('auth')->group(function () {
    Route::get('/', [UserDocumentsController::class, 'index'])->name('index');
    Route::get('/create', [UserDocumentsController::class, 'create'])->name('create');
    Route::post('/', [UserDocumentsController::class, 'store'])->name('store');
    Route::get('/{document}', [UserDocumentsController::class, 'show'])->name('show');
    Route::get('/{document}/edit', [UserDocumentsController::class, 'edit'])->name('edit');
    Route::put('/{document}', [UserDocumentsController::class, 'update'])->name('update');
    Route::delete('/{document}', [UserDocumentsController::class, 'destroy'])->name('destroy');

    // ✅ Routes pour approbation et rejet de documents
    Route::post('/{document}/approve', [UserDocumentsController::class, 'approve'])->name('approve');
    Route::post('/{document}/reject', [UserDocumentsController::class, 'reject'])->name('reject');
});