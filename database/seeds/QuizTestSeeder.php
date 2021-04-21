<?php

use Illuminate\Database\Seeder;
use App\Models\QuizTest;
class QuizTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(QuizTest::class, 10)->create();
    }
}
