<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'school_id' => 1, // Set the school_id as per your school data
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'school_id' => 2, // Set the school_id as per your school data
            ],
            // Add more member data as needed
        ];

        DB::table('members')->insert($data);
    }
}
