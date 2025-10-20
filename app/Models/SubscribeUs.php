<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscribeUs extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'tenant_id'
    ];

    public function tenant()
    {
        return $this->belongsTo(Store::class, 'tenant_id');
    }
}
