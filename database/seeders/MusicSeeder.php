<?php

use Illuminate\Database\Seeder;
use App\Models\Music;

class MusicSeeder extends Seeder
{
    public function run()
    {
        Music::factory()->count(1000)->create();
    }
}


