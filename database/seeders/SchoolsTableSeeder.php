<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
    public function run()
    {
        $csvFile = resource_path('SCHOOL_LIST.csv');
        $schoolsData = array_map('str_getcsv', file($csvFile));

        foreach ($schoolsData as $data) {
            $schoolName = $data[0]; // Adjust the index based on your CSV format
            DB::table('schools')->insert(['SchoolName' => $schoolName]);
        }
    }
}
