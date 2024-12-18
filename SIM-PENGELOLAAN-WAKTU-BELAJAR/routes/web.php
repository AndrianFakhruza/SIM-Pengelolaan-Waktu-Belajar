<?php
use App\Http\Controllers\AssigmentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboardd');
    Route::get("/dashboard", [CategoryController::class, 'index'])->name("dashboard");
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get("/notification", function () {
    return Inertia::render("Notification");
})->name("notification");

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get("/category/{id}", [CategoryController::class, 'index'])->name("category.index");
    Route::post("/category", [CategoryController::class, 'store'])->name("category.store");
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get("/assigment/{id}", [AssigmentController::class, 'index'])->name("assigment.show");
    Route::post("/assigment", [AssigmentController::class, 'store'])->name("assigment.store");
});

Route::post('/profile/update', [ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware(['auth', 'verified']);

Route::get('/user/{id}', function ($id) {
    return User::find($id);
});

Route::get('/profile', function () {
    return Inertia::render('Profile');
})->name('profile');

// Redirect /user/profile to /profile
Route::redirect('/user/profile','/profile');
?>