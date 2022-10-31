<?php

namespace Database\Seeders;

use App\Models\AccountDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountDetail::create([
            'account_type' => 'Shares Account',
            'interest' => 1,
            'duration' => '12',
        ]);
        AccountDetail::create([
            'account_type' => 'Institutional Shares Account',
            'interest' => 1,
            'duration' => '12',
        ]);
        AccountDetail::create([
            'account_type' => 'Normal Loans Account',
            'interest' => 5,
            'duration' => '12',
        ]);
        AccountDetail::create([
            'account_type' => 'Table Banking Loans Account',
            'interest' => 5,
            'duration' => '12',
        ]);
        AccountDetail::create([
            'account_type' => 'Emergency Loan Account',
            'interest' => 5,
            'duration' => '12',
        ]);
    }
}
