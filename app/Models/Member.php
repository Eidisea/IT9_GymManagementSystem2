<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'age'
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
