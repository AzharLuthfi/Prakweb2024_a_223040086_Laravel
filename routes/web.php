<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Muhamad Azhar Luthfiadi', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Muhammad Azhar Luthfiadi',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias accusantium cum nam culpa optio 
            porro impedit similique atque explicabo consectetur!. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Ipsum ullam error quibusdam enim nostrum repudiandae consequuntur voluptas voluptatibus reiciendis magni.'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Muhammad Azhar Luthfiadi',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Minima exercitationem ratione non, dolor fugit officiis molestias enim alias, 
            consequatur possimus voluptatem et facilis esse, sapiente saepe iure in quo illum.'
            ]
        ]
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Muhammad Azhar Luthfiadi',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias accusantium cum nam culpa optio 
        porro impedit similique atque explicabo consectetur!. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
        Ipsum ullam error quibusdam enim nostrum repudiandae consequuntur voluptas voluptatibus reiciendis magni.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Muhammad Azhar Luthfiadi',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Minima exercitationem ratione non, dolor fugit officiis molestias enim alias, 
        consequatur possimus voluptatem et facilis esse, sapiente saepe iure in quo illum.'
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);



});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});