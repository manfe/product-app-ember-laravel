<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name' => str_random(10),
                'value' => 5.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            echo "Product $i inserted in database\n";

        }
    }
}
