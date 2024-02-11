<?php

namespace Database\Seeders;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\User;
use App\Models\Comment;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $user = User::factory()->create([
            'name' => 'Wamian Dorytko',
            'email' => 'jakisemail@gmail.com',
        ]);
       User::factory(10)->create();
        
       /* $user = User::create([
            'name' => 'Wamian Dorytko',
            'email' => '1luvcars@gmail.com'
        ]);*/
       

        /*
    Comment::create([
    'publication_id' => 2,
    'author_id' => $user->id,
    'content' => 'Jednoreki bandyta na topie!!!!!!1111!!!!11!!!!1!!1!!!!!!!!!1!!!!!!!!1!'
    ]);

    Comment::create([
    'publication_id' => 2,
    'author_id' => $user->id,
    'content' => 'Mój ulubony drajwer ong'
    ]);

Comment::create([
    'publication_id' => 3,
    'author_id' => $user->id,
    'content' => 'Straight up facts!!!!!!!!!!'
]);
Comment::create([
'publication_id' => 1,
'author_id' => $user->id,
'content' => 'Ona lubi pomarancze łoloooooo'
]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        */
    }
    


}


