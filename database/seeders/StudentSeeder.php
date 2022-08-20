<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            [
                'name'=>'Muhammad Faisal',
                'city'=>'Karachi',
                'fees'=>'2222'
                    
                ],
                [
                    'name'=>'Muhammad Ali',
                    'city'=>'Karachi',
                    'fees'=>'5000'
                        
                    ],
                [
                        'name'=>'Muhammad Kaleem',
                        'city'=>'Hyderabad',
                        'fees'=>'1000'
                            
                        ]

        ]
            
        
        
        
        
        );
        
    }
}
