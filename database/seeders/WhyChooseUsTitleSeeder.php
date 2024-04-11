<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SectionTitle;

class WhyChooseUsTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionTitle::insert([
            [
                'key' =>  'Why_chosse_us_top_title',
                'value' =>  'Why Choose Us',
            ],
            [
                'key' =>  'Why_chosse_us_Mian_title',
                'value' =>  'Why Choose Us',
            ],
            [
                'key' =>  'Why_chosse_us_Sub_title',
                'value' =>  'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem nobis totam doloribus, quam accusantium amet ea',
            ],
        ]);
    }
}
