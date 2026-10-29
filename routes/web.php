<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VantEcosystemController;

// Redirección inicial
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Principal del Calendario
    Route::get('/dashboard', [CalendarController::class, 'dashboard'])->name('dashboard');
    
    // Vista de Tablero (Apple Style)
    Route::get('/board', [CalendarController::class, 'board'])->name('calendar.board');
    
    // CRUD del Calendario (index, create, store, show, edit, update, destroy)
    Route::resource('calendar', CalendarController::class);
    
    // Alternar Estado (Publicado / En Proceso)
    Route::patch('/calendar/{id}/toggle-status', [CalendarController::class, 'toggleStatus'])->name('calendar.toggleStatus');

    // Perfil de Usuario (Autenticación Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Módulo Público VANT | VENEZUELA
Route::get('/', [VantEcosystemController::class, 'home'])->name('vant.home');
Route::get('/quienes-somos', [VantEcosystemController::class, 'about'])->name('vant.about');
Route::get('/portfolio', [VantEcosystemController::class, 'portfolio'])->name('vant.portfolio');
Route::get('/chat-cotizacion', [VantEcosystemController::class, 'chatQuote'])->name('vant.chat');

// Endpoint para el despacho del Chat a WhatsApp o Gmail
Route::post('/vant/dispatch-lead', [VantEcosystemController::class, 'dispatchLead'])->name('vant.dispatch.lead');

// Rutas de autenticación (Login, Registro, Password Reset)
require __DIR__.'/auth.php';