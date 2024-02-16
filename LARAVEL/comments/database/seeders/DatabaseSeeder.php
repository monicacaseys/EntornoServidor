<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Esto es para que cree 10 usuarios y cada usuario tenga 3 comentarios
        \App\Models\User::factory(10)
        ->hasComments(3)
        ->create(); 

        // Ahora quiero que te traigas todos los comentarios
        $comments = \App\Models\Comment::get();

        foreach($comments as $comment){
            \App\Models\Reply::factory(rand(1,3))->create([
            'comment_id' => $comment->id,
            'user_id' => rand(1,10)
            ]);
        }
    }
}
