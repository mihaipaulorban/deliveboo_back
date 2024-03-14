<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Italian', 'img' => './storage/typeimg/italian.jpeg'],
            ['name' => 'French', 'img' => './storage/typeimg/french.jpeg'],
            ['name' => 'Barbecue', 'img' => './storage/typeimg/barbecue.jpeg'],
            ['name' => 'Chinese', 'img' => './storage/typeimg/chinese.jpg'],
            ['name' => 'Sushi', 'img' => './storage/typeimg/sushi.jpg'],
            ['name' => 'Thai', 'img' => './storage/typeimg/thai.jpeg'],
            ['name' => 'Greek', 'img' => './storage/typeimg/greek.jpg'],
            ['name' => 'Romanian', 'img' => './storage/typeimg/romanian.jpg'],
            ['name' => 'North African', 'img' => './storage/typeimg/northafrican.jpeg'],
        ];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type['name'];
            $new_type->img = $type['img'];

            $new_type->save();
        }
    }
}
