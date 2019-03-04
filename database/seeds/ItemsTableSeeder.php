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
                "wahProp" => $faker->phoneNumber ,
                "type" => $faker->word,
                "details"=> $faker->catchPhrase,
                "dateProc"=> $faker->word,
                "method"=> $faker->word,
                "from"=> $faker->state,
                "cost"=> $faker->numberBetween($min = 1000, $max = 9000),
                "assignTo"=> $faker-> name,
                "depre"=> $faker->numberBetween($min = 100, $max = 900)

            ]
        );
    };
        //
    }
}
