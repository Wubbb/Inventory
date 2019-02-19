<?php

use Illuminate\Database\Seeder;
use App\Report;
class ReportsTableSeeder extends Seeder
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
            Report::create(
                [
                    "property" => $faker->state,
                    "type" => $faker->word,
                    "details" => $faker->word,
                    "assignedTo" => $faker->name
                ]


                );
        }
        //
    }
}
