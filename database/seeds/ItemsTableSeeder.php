<?php

use Illuminate\Database\Seeder;
use App\Item;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0;$i<100;$i++) {
        Item::create(
            [
                "title" => $faker->firstNameMale,
                "desc" => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
                "from" => $faker->state
            ]
        );
    };
        //
    }
}
