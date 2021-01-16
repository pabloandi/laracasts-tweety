<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tweet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $john = User::factory()->create([
            'username' => 'johndoe',
            'name' => 'John Doe',
            'email' => 'john@doe.com'
        ]);

        $jane = User::factory()->create([
            'username' => 'janedoe',
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com'
        ]);

        $mark = User::factory()->create([
            'username' => 'markdoe',
            'name' => 'Mark Doe',
            'email' => 'mark@doe.com'
        ]);

        $john->follow($jane);
        $john->follow($mark);

        Tweet::factory()->count(3)->for($john)->create();
        Tweet::factory()->count(3)->for($jane)->create();
        Tweet::factory()->count(3)->for($mark)->create();


    }

}
