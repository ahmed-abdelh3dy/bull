<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\produtes;

class ProdutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        produtes::create([
            'produte_name' => 'مراتب تركي ',
            'descrption' => 'صناعه اوربيه فاخره',
            'section_id' => '1',
        ]);

        produtes::create([
            'produte_name' => 'مراتب مصري ',
            'descrption' => 'صناعه مصريه فاخره',
            'section_id' => '1',
        ]);


        produtes::create([
            'produte_name' => 'سجاد تركي ',
            'descrption' => 'صناعه مصريه فاخره',
            'section_id' => '2',
        ]);


        produtes::create([
            'produte_name' => 'سجاد مصري ',
            'descrption' => 'صناعه مصريه فاخره',
            'section_id' => '2',
        ]);


        produtes::create([
            'produte_name' => 'مفروشات تركي ',
            'descrption' => 'صناعه اوربيه فاخره',
            'section_id' => '3',
        ]);


        produtes::create([
            'produte_name' => 'مفروشات مصري ',
            'descrption' => 'صناعه مصريه فاخره',
            'section_id' => '3',
        ]);

        produtes::create([
            'produte_name' => 'حافظات تركي ',
            'descrption' => 'صناعه اوربيه فاخره',
            'section_id' => '4',
        ]);


        produtes::create([
            'produte_name' => 'حافظات مصري ',
            'descrption' => 'صناعه مصريه فاخره',
            'section_id' => '4',
        ]);
    }
}
