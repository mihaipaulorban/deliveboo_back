<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = ['Pizzeria Bella Napoli', 'Kebab Piramide d\'Egitto', 'Ristorante Vista Mare', 'Bar Alta Montagna'];
        foreach ($restaurants as $restaurant) {

            $new_restaurant = new Restaurant();

            $new_restaurant->name = $restaurant;

            $new_restaurant->save();
        }
    }
}
