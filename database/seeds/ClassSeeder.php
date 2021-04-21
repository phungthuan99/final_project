<?php

use Illuminate\Database\Seeder;
use App\Models\Classes;
class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Classes::class, 10)->create();
    }
}
