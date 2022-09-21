<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [GuestController::class, 'show'])->name('home');
Route::get('/onePost/{id}', [GuestController::class, 'showOne'])->name('one');
Route::get('/aboutAuthor/{id}/{post_id}', [GuestController::class, 'aboutAuthor'])->name('about');
Route::get('/search', [GuestController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [AuthUserController::class, 'index'])->name('dashboard')->middleware('role:user|super-admin');
Route::get('/dashboard/aboutAuthor/{id}/{post_id}', [AuthUserController::class, 'aboutAuthor'])->name('auth-aboutAuthor')->middleware('role:user|super-admin');
Route::get('/authsearch', [AuthUserController::class, 'search'])->name('authsearch')->middleware('role:user|super-admin');
Route::get('/profile', [AuthUserController::class, 'profile'])->name('profile')->middleware('role:user|super-admin');
Route::get('/update/profile', [AuthUserController::class, 'updateProfile'])->name('edit-profile')->middleware('role:user|super-admin');
Route::put('/store/profile', [AuthUserController::class, 'postUpdateProfile'])->name('update-profile')->middleware('role:user|super-admin');

Route::get('/warning/{post}', [PostController::class, 'warning'])->name('post-warning')->middleware('role:user|super-admin');
Route::get('/adm-warning/{post}', [PostController::class, 'admin_warning'])->name('admin-warning')->middleware('role:super-admin');
Route::delete('/adm-destroy/{post}', [PostController::class, 'admin_destroy'])->name('admin-destroy')->middleware('role:super-admin');

Route::resource('posts', PostController::class);

Route::get('/coment/store/{post}', [ComentController::class, 'store'])->name('coment-store')->middleware('role:user|super-admin');
Route::get('/coment/edit/{coment}/{post}', [ComentController::class, 'edit'])->name('coment-edit')->middleware('role:user|super-admin');
Route::put('/coment/update/{coment}/{post}', [ComentController::class, 'update'])->name('coment-update')->middleware('role:user|super-admin');
Route::delete('/coment/destroy/{coment}', [ComentController::class, 'destroy'])->name('coment-destroy')->middleware('role:user|super-admin');

Route::resource('roles', RoleController::class)->middleware('role:super-admin');
Route::resource('users', UserController::class)->middleware('role:super-admin');

Route::get('/user/warning/{user}', [UserController::class, 'warning'])->name('user-warning')->middleware('role:super-admin');
});

require __DIR__.'/auth.php';
