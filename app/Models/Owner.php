<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'identity_card';
    protected $keyType = 'string';
    public $incrementing = false;

    public function vehicles() {
        return $this->hasMany(Vehicle::class, 'owner_id', 'identity_card');
    }
}
