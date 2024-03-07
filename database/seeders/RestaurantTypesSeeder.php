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
            ['name' => 'Italian', 'img' => '../typeimg/italian.png'],
            ['name' => 'French', 'img' => '../typeimg/french.png'],
            ['name' => 'Barbecue', 'img' => '../typeimg/barbecue.png'],
            ['name' => 'Chinese', 'img' => '../typeimg/chinese.png'],
            ['name' => 'Sushi', 'img' => '../typeimg/sushi.png'],
            ['name' => 'Thai', 'img' => '../typeimg/thai.png'],
            ['name' => 'Greek', 'img' => '../typeimg/greek.png'],
            ['name' => 'Romanian', 'img' => '../typeimg/romanian'],
            ['name' => 'North African', 'img' => '../typeimg/northafrican'],
        ];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type['name'];
            $new_type->img = $type['img'];

            $new_type->save();
        }
    }
}
