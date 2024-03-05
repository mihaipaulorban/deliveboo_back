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
            ['name' => 'Italian', 'img' => 'image1'],
            ['name' => 'French', 'img' => 'image2'],
            ['name' => 'Barbecue', 'img' => 'image3'],
            ['name' => 'Chinese', 'img' => 'image4'],
            ['name' => 'Sushi', 'img' => 'image5'],
            ['name' => 'Thai', 'img' => 'image6'],
            ['name' => 'Greek', 'img' => 'image7'],
            ['name' => 'Romanian', 'img' => 'image8'],
            ['name' => 'North African', 'img' => 'image9'],
        ];
        foreach ($types as $type) {
            $new_type = new Type();

            $new_type->name = $type['name'];
            $new_type->img = $type['img'];
        }
    }
}
