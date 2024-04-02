<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentsController;
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


require __DIR__.'/auth.php';
