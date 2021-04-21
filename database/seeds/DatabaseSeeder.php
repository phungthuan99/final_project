<?php

// use App\Models\Lesson_content;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(Question_testSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(ArchivementSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(History_learned_classSeeder::class);
        $this->call(NewSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(NotificationSeeder::class);



    }
}
