<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name_seed = ['Pizza Margherita', 'Pizza Pepperoni', 'Pizza Vegetariana', 'Pizza Hawaiana', 'Pizza Pollo Barbecue', 'Pizza Funghi', 'Pizza Suprema', 'Pizza Pollo Piccante', 'PIzza 4 Formaggi', 'Pizza Delizia Vegetariana'];
        $desc_seed = [
            'Pizza tradizionale italiana con salsa di pomodoro, mozzarella e basilico fresco',
            'Pizza classica con fette di pepperoni piccanti e mozzarella',
            'Pizza carica di verdure fresche assortite e mozzarella',
            'Pizza con prosciutto, ananas e mozzarella',
            'Pizza con salsa BBQ, pollo alla griglia, cipolle e mozzarella',
            'Pizza con funghi saltati in padella, aglio e mozzarella',
            'Pizza carica di pepperoni, salsiccia, peperoni, cipolle, olive e mozzarella',
            'Pizza con pollo piccante al buffalo, salsa ranch e mozzarella',
            'Pizza con un mix di mozzarella, cheddar, Parmigiano e gorgonzola',
            'Pizza carica di una varietà di verdure fresche e mozzarella'
        ];
        $price_seed = [10.99, 12.99, 11.99, 13.99, 14.99, 11.99, 15.99, 12.50, 11.90, 12.30];
        $vis_seed = 1;
        $veg_seed = 0;
    }
}
