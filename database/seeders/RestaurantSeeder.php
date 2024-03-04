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
        $restaurants = [
            ['name' => 'Pizzeria Bella Napoli', 'address' => 'Indirizzo Pizzeria Bella Napoli', 'p_iva' => '12345678901'],
            ['name' => 'Kebab Piramide d\'Egitto', 'address' => 'Indirizzo Kebab Piramide d\'Egitto', 'p_iva' => '23456789012'],
            ['name' => 'Ristorante Vista Mare', 'address' => 'Indirizzo Ristorante Vista Mare', 'p_iva' => '34567890123'],
            ['name' => 'Bar Alta Montagna', 'address' => 'Indirizzo Bar Alta Montagna', 'p_iva' => '45678901234']
        ];

        foreach ($restaurants as $restaurantData) {
            $new_restaurant = new Restaurant();

            $new_restaurant->name = $restaurantData['name'];
            $new_restaurant->address = $restaurantData['address'];
            $new_restaurant->p_iva = $restaurantData['p_iva'];

            $new_restaurant->save();
        }
    }
}
