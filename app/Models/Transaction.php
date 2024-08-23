<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['from_account', 'to_account', 'amount', 'transaction_date', 'status', 'payment_service'];

    // Relations
    public function fromAccount()
    {
        return $this->belongsTo(Account::class, 'from_account', 'account_number');
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'to_account', 'account_number');
    }
}
