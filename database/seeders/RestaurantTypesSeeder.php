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
            ['name' => 'Italian', 'img' => './storage/app/public/typeimg/italian.png'],
            ['name' => 'French', 'img' => './storage/app/public/typeimg/french.png'],
            ['name' => 'Barbecue', 'img' => './storage/app/public/typeimg/barbecue.png'],
            ['name' => 'Chinese', 'img' => './storage/app/public/typeimg/chinese.png'],
            ['name' => 'Sushi', 'img' => './storage/app/public/typeimg/sushi.png'],
            ['name' => 'Thai', 'img' => './storage/app/public/typeimg/thai.png'],
            ['name' => 'Greek', 'img' => './storage/app/public/typeimg/greek.png'],
            ['name' => 'Romanian', 'img' => './storage/app/public/typeimg/romanian'],
            ['name' => 'North African', 'img' => './storage/app/public/typeimg/northafrican'],
        ];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type['name'];
            $new_type->img = $type['img'];

            $new_type->save();
        }
    }
}
