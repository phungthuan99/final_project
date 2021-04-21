<?php

use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Level::class, 5)->create();
    }
}
