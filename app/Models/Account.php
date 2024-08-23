<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'account_number';
    protected $keyType = 'bigint';
    public $incrementing = false;

    protected $fillable = ['account_number', 'user_id', 'secret_code', 'balance'];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'from_account', 'account_number');
    }
}
