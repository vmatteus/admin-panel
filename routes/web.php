<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\UserController;
use App\Models\Message;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
});

Route::post('/api/mensagem', function () {
    $data = request()->all();

    $message = new Message();
    $message->from = $data['from'];
    $message->type = $data['type'];
    $message->content = $data['content'];
    $message->timestamp = $data['timestamp'];
    $message->sender = $data['sender'];
    $message->isGroup = $data['isGroup'] ?? false;
    $message->fromMe = $data['fromMe'] ?? false;
    $message->save();

    return response()->json(['message' => 'recebida!']);
})->name('mensagem');

require __DIR__.'/auth.php';
