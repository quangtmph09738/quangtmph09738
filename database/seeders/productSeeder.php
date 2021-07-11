<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = FakerFactory::create();
        for($i=0;$i<10;$i++){
            $data = [
                'name' => $faker->name,
                'price' => $faker->randomNumber(1,10),
                'quantity' => $faker->randomNumber(1,5),
                'description' => $faker->text,
                'category_id' => $faker->randomNumber(1,10),
                'img' => $faker->text,
            ];
            DB::table('products')->insert($data);
        }
    }
}
