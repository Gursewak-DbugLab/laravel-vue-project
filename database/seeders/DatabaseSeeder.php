<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\CardList;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('test@example'),
        ]);

        $boards = Board::factory(10)->for($user)->create();

        foreach ($boards as $board) {
            $cardList = CardList::factory()->create([
                'user_id' => $user->id,
                'board_id' => $board->id,
            ]);

            Card::factory(50)->create([
                'user_id' => $user->id,
                'board_id' => $board->id,
                'card_list_id' => $cardList->id,
            ]);
        }
    }
}
