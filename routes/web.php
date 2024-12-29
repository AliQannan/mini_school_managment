<?php
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CertificateController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



    

Route::view('homework', 'Homework')->middleware(['auth'])->name('homework');
Route::view('settings', 'Settings')->middleware(['auth'])->name('settings');



Route::middleware(['auth'])->group(function () {
    // Route for displaying all materials (index)
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');

    // Route for creating a new material
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');

    Route::get('materials/{id}' , [MaterialController::class , 'show'])->name('materials.show');
    // Route for storing the new material
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');

    // Route for editing a material
    Route::get('/materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');

    // Route for updating a material
    Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('materials.update');

    // Route for deleting a material
    Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');
});

// web.php



Route::middleware(['auth'])->group(function () {
    Route::resource('quizzes', QuizController::class);
});


Route::post('/quizzes/{id}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');

Route::get('/certificate/{material_id}', [CertificateController::class, 'generate'])->name('certificate.generate');




require __DIR__.'/auth.php';
