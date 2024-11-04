<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Muhamad Azhar Luthfiadi', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    $post = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog page', 'posts' => $post]);

});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $post = Post::find($slug);
    return view('posts', ['title' => count($user->posts) . ' Article by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $post = Post::find($slug);
    return view('posts', ['title' => ' Article in Category : ' . $category->name, 'posts' => $category->posts]);
});

