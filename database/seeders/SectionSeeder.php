<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sections;
use Illuminate\Support\Facades\Auth;


class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sections::create([
            'section_name' => ' المراتب ',
            'descrption' => 'اول قسم ',
            'created-by' => 'Admin',
        ]);

        sections::create([
            'section_name' => ' السجاد ',
            'descrption' => 'اول قسم ',
            'created-by' => 'Admin',
        ]);

        sections::create([
            'section_name' => ' المفارش ',
            'descrption' => 'اول قسم ',
            'created-by' => 'Admin',
        ]);


        sections::create([
            'section_name' => ' الحافظات ',
            'descrption' => 'اول قسم ',
            'created-by' => 'Admin',
        ]);


       

    }
}
