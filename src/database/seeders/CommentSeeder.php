<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $books = Book::all();

        foreach ($users as $user) {
            foreach ($books as $book) {
                Comment::factory()
                    ->count(3)
                    ->for($user)
                    ->for($book)
                    ->create();
            }
        }
    }
}
