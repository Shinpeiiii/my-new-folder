<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $it = Section::firstOrCreate(['name' => 'IT'], ['room' => 'A101']);
        $biz = Section::firstOrCreate(['name' => 'Business'], ['room' => 'B202']);

        Student::firstOrCreate(['email' => 'alice@example.com'], [
            'first_name' => 'Alice','last_name' => 'Anderson','section_id' => $it->id,
        ]);
        Student::firstOrCreate(['email' => 'bob@example.com'], [
            'first_name' => 'Bob','last_name' => 'Baker','section_id' => $biz->id,
        ]);
    }
}
