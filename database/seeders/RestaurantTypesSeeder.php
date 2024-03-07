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
            ['name' => 'Italian', 'img' => './storage/typeimg/italian.png'],
            ['name' => 'French', 'img' => './storage/typeimg/french.png'],
            ['name' => 'Barbecue', 'img' => './storage/typeimg/barbecue.png'],
            ['name' => 'Chinese', 'img' => './storage/typeimg/chinese.png'],
            ['name' => 'Sushi', 'img' => './storage/typeimg/sushi.png'],
            ['name' => 'Thai', 'img' => './storage/typeimg/thai.png'],
            ['name' => 'Greek', 'img' => './storage/typeimg/greek.png'],
            ['name' => 'Romanian', 'img' => './storage/typeimg/romanian.png'],
            ['name' => 'North African', 'img' => './storage/typeimg/northafrican.png'],
        ];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type['name'];
            $new_type->img = $type['img'];

            $new_type->save();
        }
    }
}
