<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $primaryKey = 'lice_plate';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getBrandAttribute($value) {
        return ucfirst($value);
    }

    public function owner() {
        return $this->belongsTo(Owner::class, 'owner_id', 'identity_card');
    }
}
