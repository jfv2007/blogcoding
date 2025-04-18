<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Livewire\Admin\Blogs\ListBlogs;
use App\Livewire\Admin\Categories\AddCategories;
use App\Livewire\Admin\Categories\EditCategories;
use App\Livewire\Admin\Categories\ListCategories;
use App\Livewire\Admin\Posts\AddPostComponent;
use App\Livewire\Admin\Posts\AddPosts;
use App\Livewire\Admin\Posts\BoostrapPosts;
use App\Livewire\Admin\Posts\CarouselPosts;
use App\Livewire\Admin\Posts\EditPosts;
use App\Livewire\Admin\Posts\LandingPosts;
use App\Livewire\Admin\Posts\ListPosts;
use App\Livewire\Admin\Users\ListUsers;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */

    Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');
    Route::get('admin/users', ListUsers::class)->name('admin.users');
    Route::get('admin/blogs', ListBlogs::class)->name('admin.blogs');
    Route::get('admin/posts', ListPosts::class)->name('admin.posts');
    Route::get('admin/posts/add', AddPosts::class)->name('admin.posts.add');
    Route::get('admin/posts/edit/{id}', EditPosts::class)->name('admin.posts.edit');
    Route::get('admin/posts/carousel', CarouselPosts::class)->name('admin.posts.carousel');
    Route::get('admin/posts/landing', LandingPosts::class)->name('admin.posts.landing');
    Route::get('admin/posts/boostrap', BoostrapPosts::class)->name('admin.posts.boostrap');

    Route::get('admin/categories', ListCategories::class)->name('admin.categories');
    Route::get('admin/categories/add', AddCategories::class)->name('admin.categories.add');
    Route::get('admin/categories/edit/{id}', EditCategories::class)->name('admin.categories.edit');

    /* Route::post("categories", "getCategory")->name('get-category'); */

});
