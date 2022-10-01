<?php

namespace Database\Seeders;

use App\Models\ShareType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShareTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShareType::create([
            'name'=>'Institution'
        ]);
        ShareType::create([
            'name'=>'Bank'
        ]);
    }
}
