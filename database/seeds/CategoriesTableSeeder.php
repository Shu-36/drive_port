<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
               'id' => '1',
               'name' => '友達と',
               
            ],
            [
                'id' => '2',
               'name' => '家族と',

                
                
            ],
            [
                'id' => '3',
               'name' => 'デート',
              
                
                
            ],
            [
                'id' => '4',
               'name' => '一人で',

                
                
            ]
            
            ]);
    }
}
