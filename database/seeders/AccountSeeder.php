<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    public function run()
    {
        $accounts = [
            ['account_number' => '98811314', 'user_id' => 1, 'secret_code' => Hash::make('012340'), 'balance' => 1052000],
            ['account_number' => '92570744', 'user_id' => 2, 'secret_code' => Hash::make('012341'), 'balance' => 15400],
            ['account_number' => '93816766', 'user_id' => 3, 'secret_code' => Hash::make('012342'), 'balance' => 2000],
            ['account_number' => '92476190', 'user_id' => 4, 'secret_code' => Hash::make('012343'), 'balance' => 35000],
            ['account_number' => '99906607', 'user_id' => 5, 'secret_code' => Hash::make('012344'), 'balance' => 3000],
            ['account_number' => '91857164', 'user_id' => 6, 'secret_code' => Hash::make('012345'), 'balance' => 1000],
            ['account_number' => '79865255', 'user_id' => 7, 'secret_code' => Hash::make('012346'), 'balance' => 4200],
            ['account_number' => '99459576', 'user_id' => 8, 'secret_code' => Hash::make('012347'), 'balance' => 4500],
            ['account_number' => '98422815', 'user_id' => 9, 'secret_code' => Hash::make('012348'), 'balance' => 12500],
            ['account_number' => '70343356', 'user_id' => 10, 'secret_code' => Hash::make('012349'), 'balance' => 5500],
        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
