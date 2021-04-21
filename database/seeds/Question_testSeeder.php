<?php

use Illuminate\Database\Seeder;
use App\Models\Question_test;
class Question_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Question_test::class, 10)->create();
    }
}
