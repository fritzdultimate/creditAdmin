<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model {
    protected $fillable = [
        'user_id',
        'balance',
        'locked_balance'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
