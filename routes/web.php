<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
	Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
	Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
	Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
	Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
	Route::get('/', [AuthController::class, 'showLoginForm']);
});

Route::middleware('auth')->group(function () {
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
	Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
	Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
	Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
	Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
	Route::patch('/todos/{id}/done', [TodoController::class, 'markAsDone'])->name('todos.markAsDone');
	Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
});
