<?php
namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
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
    }

    public static function find($slug): array
    {

        $post = Arr::first(Post::all(), fn($post) => $post['slug'] == $slug);
        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
