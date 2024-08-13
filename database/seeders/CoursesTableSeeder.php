<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'Cybersecurity',
            'Digital Marketing',
            'Web Development',
            'Microsoft Power Bi',
            'Database Development',
            'Graphic Design',
            'USSD',
            'Microsoft Office',
            'Python Programming',
            'Mobile App Development'
        ];

        foreach ($courses as $courseName) {
            // Generate a unique course code
            $code = "PROG" . strtoupper(bin2hex(random_bytes(5)));

            // Insert the course into the database
            DB::table('courses')->insert([
                'trans_id' => uniqid(),
                'course_code' => $code,
                'course_name' => $courseName,
                'deleted' => false,
                'createuser' => 'admin',  // Set to 'admin' or another default user
                'createdate' => now(),
                'modifyuser' => 'admin',  // Set to 'admin' or another default user
                'modifydate' => now()
            ]);
        }
    }
}