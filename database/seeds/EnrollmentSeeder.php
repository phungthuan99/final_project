<?php

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Enrollment::class, 10)->create();
    }
}
