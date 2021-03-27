<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Cookware', 'description' => 'Serve up a superior slice with pizza pans that distribute heat evenly and cook your pizza to perfection. Make mouth watering Mediterranean meals with our non-stick paella pans that help to retain moisture and flavo'],
            ['name' => 'Steamers', 'description' => 'Steaming is the healthiest way to prepare your meals. Instead of boiling your food, which can cause nutrients to seep into the water, try steaming it with one of our stunning ProCook steamer sets. Crafted from high grade materials, our steamers and poachers are dishwasher safe'],
            ['name' => 'Baking', 'description' => "Buy bakeware sets from ProCook, the UK's leading specialist baking sets retailer with next day delivery and money back guarantee"],
        ]);
    }
}
