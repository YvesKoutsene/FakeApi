<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $transactions = [
            ['from_account' => '98811314', 'to_account' => '92570744', 'amount' => 100, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Flooz'],
            ['from_account' => '93816766', 'to_account' => '92476190', 'amount' => 200, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Tmoney'],
            ['from_account' => '99906607', 'to_account' => '91857164', 'amount' => 300, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Tmoney'],
            ['from_account' => '79865255', 'to_account' => '99459576', 'amount' => 400, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Flooz'],
            ['from_account' => '98422815', 'to_account' => '70343356', 'amount' => 500, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Tmoney'],
            ['from_account' => '92570744', 'to_account' => '93816766', 'amount' => 600, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Tmoney'],
            ['from_account' => '92476190', 'to_account' => '99906607', 'amount' => 700, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Mobile Money'],
            ['from_account' => '91857164', 'to_account' => '79865255', 'amount' => 800, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Orange'],
            ['from_account' => '99459576', 'to_account' => '98422815', 'amount' => 900, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Orange'],
            ['from_account' => '70343356', 'to_account' => '98811314', 'amount' => 1000, 'transaction_date' => Carbon::now(), 'status' => 'completed', 'payment_service' => 'Tmoney'],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}
