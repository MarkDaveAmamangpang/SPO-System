    <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\DocumentsController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AchievementsController;
    use App\Models\Document;
    use App\Models\Achievement;
    use Illuminate\Support\Facades\Route;

    // Public routes
    Route::get('/', function () {
        return view('welcome');
    });

    // Authenticated routes
    Route::middleware(['auth', 'verified'])->group(function () {
        // User profile routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // User dashboard route
        Route::get('/dashboard', function () {
            // Fetch the documents associated with the current user
            $documents = Document::where('user_id', Auth::id())->get();
            $achievements = Achievement::where('user_id', Auth::id())->get();
            
            return view('user/dashboard', [
                'documents' => $documents,
                'achievements' => $achievements,
            ]);
        })->name('dashboard');

        // Document routes
        Route::post('/document', [DocumentsController::class, 'store'])->name('documents.store');

        // Achievement routes
        Route::post('/achievements', [AchievementsController::class, 'store'])->name('achievements.store');

        // Admin routes
        Route::prefix('admin')->group(function () {
            // Admin dashboard
            Route::get('/admindashboard', [AdminController::class, 'index'])->name('admin.admindashboard');
        
            // Admin awards
            Route::get('/awards', [AdminController::class, 'awards'])->name('admin.awards');
        
            // Admin coaches
            Route::get('/coaches', [AdminController::class, 'coaches'])->name('admin.coaches-accounts');
        
            // Admin players
            Route::get('/players', [AdminController::class, 'players'])->name('admin.player-accounts');
        
            // Archive view
            Route::get('/archive', [AdminController::class, 'archive'])->name('admin.archive-accounts');
            
            // Archive and unarchive individual accounts
            Route::post('/archive/{id}', [AdminController::class, 'archiveAccount'])->name('admin.archive');

            Route::post('/unarchive/{id}', [AdminController::class, 'unarchiveAccount'])->name('admin.unarchive');
        
            // Archived users
            Route::get('/archive-accounts', [AdminController::class, 'archivedUsers'])->name('admin.archive-accounts');
        
            // Archive selected players
            Route::post('/archive-selected', [AdminController::class, 'archiveSelected'])->name('admin.archive-selected');

            // Awards management routes
            Route::get('/awards/{award}/edit', [AchievementsController::class, 'edit'])->name('admin.award-edit');
            
            Route::delete('/awards/{award}', [AchievementsController::class, 'destroy'])->name('admin.award.delete');
            
            Route::put('/awards/{award}', [AchievementsController::class, 'update'])->name('admin.award.update'); 
            
            Route::get('/admin/player/{id}', [AdminController::class, 'viewPlayer'])->name('admin.view-player');

            Route::get('/admin/coach/{id}', [AdminController::class, 'viewCoach'])->name('admin.view-coach');

            Route::get('/admin/print/players', [AdminController::class, 'printPlayers'])->name('admin.print.players');

            Route::get('/admin/print/coaches', [AdminController::class, 'printCoaches'])->name('admin.print.coaches');

            Route::get('/admin/print/awards', [AdminController::class, 'printAwards'])->name('admin.print.awards');
        });

           
        
    });

    require __DIR__.'/auth.php';
