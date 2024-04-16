<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\AdminController;
use App\Models\Document;

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
        
        return view('dashboard', [
            'documents' => $documents
        ]);
    })->name('dashboard');

    // Route::get('/document', [DocumentsController::class, 'display'])->name('documents.display'); // View all documents
    Route::post('/document', [DocumentsController::class, 'store'])->name('documents.store'); // Upload a new document
    // Route::get('/document/{document}', [DocumentsController::class, 'show'])->name('document.show'); // View a specific document
    // Route::delete('/document/{document}', [DocumentsController::class, 'destroy'])->name('document.destroy'); // Delete a document
});

// Route::get('/admin/admindashboard', function () {
//     return view('admin.admindashboard');
// });

// Route::get('/admin/awards', function () {
//     return view('admincomponents.awards');
// });

// Route::get('/admin/coaches', function () {
//     return view('admincomponents.coaches-accounts');
// });

// Route::get('/admin/players', function () {
//     return view('admincomponents.players-accounts');
// });
Route::get('/admin/admindashboard', [AdminController::class, 'index'])->name('admin.admindashboard');

Route::prefix('admin')->group(function () {
    Route::get('/awards', [AdminController::class, 'awards'])->name('admin.awards');
    Route::get('/coaches', [AdminController::class, 'coaches'])->name('admin.coaches-accounts');
    Route::get('/players', [AdminController::class, 'players'])->name('admin.player-accounts');
});

// You need to define routes for reports and settings as well




require __DIR__.'/auth.php';
