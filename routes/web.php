<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AchievementsController;
use App\Models\Document;
use App\Models\Achievement;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        // Fetch the documents associated with the current user
        $documents = Document::where('user_id', Auth::id())->get();
        $achievements = Achievement::where('user_id', Auth::id())->get();
        
        return view('dashboard', [
            'documents' => $documents,
            'achievements' => $achievements,
        ]);
    })->name('dashboard');

    Route::post('/document', [DocumentsController::class, 'store'])->name('documents.store'); // Upload a new document

    Route::post('/achievements', [AchievementsController::class, 'store'])->name('achievements.store'); // Add a new achievement
   
});


Route::get('/admin/admindashboard', [AdminController::class, 'index'])->name('admin.admindashboard');

Route::prefix('admin')->group(function () {
    Route::get('/awards', [AdminController::class, 'awards'])->name('admin.awards');
    Route::get('/coaches', [AdminController::class, 'coaches'])->name('admin.coaches-accounts');
    Route::get('/players', [AdminController::class, 'players'])->name('admin.player-accounts');
});




require __DIR__.'/auth.php';
