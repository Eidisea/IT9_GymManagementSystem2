<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'member_id',
        'plan_type',
        'amount',
        'start_date',
        'end_date',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'decimal:2'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
