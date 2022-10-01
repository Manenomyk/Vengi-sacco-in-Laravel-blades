<?php

namespace Database\Seeders;

use App\Models\LoanType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanType::create([
            'name'=>'table bank',
            'duration'=>'18'
        ]);
        LoanType::create([
            'name'=>'short term',
            'duration'=>'4'
        ]);
        LoanType::create([
            'name'=>'short bank',
            'duration'=>'4'
        ]);
    }
}
