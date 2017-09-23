<?php

use Illuminate\Database\Seeder;
use App\Product;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id'            => 1,
            'name'          => 'My Book',
            'description'     => 'A great book',
            'price'     => '2000',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s")
        ]);

        Product::create([
            'id'            => 2,
            'name'          => 'My Best Book',
            'description'     => 'A really great book',
            'price'     => '3000',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s")
        ]);
    }
}
