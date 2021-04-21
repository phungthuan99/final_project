<?php

use Illuminate\Database\Seeder;
use App\Models\History_learned_class;
class History_learned_classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(History_learned_class::class, 10)->create();
    }
}
