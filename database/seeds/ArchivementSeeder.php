<?php

use Illuminate\Database\Seeder;
use App\Models\{Archivement};
class ArchivementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Archivement::class, 10)->create();
    }
}
