<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::group(
    [
        'prefix' => '',
    ],
    function () {
        Route::get('', [GuestController::class, 'show'])->name('home');
        Route::get('onePost/{id}', [GuestController::class, 'showOne'])->name('one');
        Route::get('aboutAuthor/{id}/{post_id}', [GuestController::class, 'aboutAuthor'])->name('about');
        Route::get('search', [GuestController::class, 'search'])->name('search');
    });

Route::group(
    [
        'middleware' => ['auth', 'role:user|super-admin'],
    ],
    function () {
        Route::get('/dashboard', [AuthUserController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/aboutAuthor/{id}/{post_id}', [AuthUserController::class, 'aboutAuthor'])->name('auth-aboutAuthor');
        Route::get('/authsearch', [AuthUserController::class, 'search'])->name('authsearch');
        Route::get('/profile', [AuthUserController::class, 'profile'])->name('profile');
        Route::get('/update/profile', [AuthUserController::class, 'updateProfile'])->name('edit-profile');
        Route::put('/store/profile', [AuthUserController::class, 'postUpdateProfile'])->name('update-profile');

        Route::resource('posts', PostController::class);
        Route::get('/warning/{post}', [PostController::class, 'warning'])->name('post-warning');
        Route::delete('/adm-destroy/{post}', [PostController::class, 'admin_destroy'])->name('admin-destroy');

        Route::get('/coment/store/{post}', [ComentController::class, 'store'])->name('coment-store');
        Route::get('/coment/edit/{coment}/{post}', [ComentController::class, 'edit'])->name('coment-edit');
        Route::put('/coment/update/{coment}/{post}', [ComentController::class, 'update'])->name('coment-update');
        Route::delete('/coment/destroy/{coment}', [ComentController::class, 'destroy'])->name('coment-destroy');

    });

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'role:super-admin'],
    ],
    function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('user/warning/{user}', [UserController::class, 'warning'])->name('user-warning');
        Route::get('/adm-warning/{post}', [PostController::class, 'admin_warning'])->name('admin-warning');
    });

require __DIR__ . '/auth.php';
