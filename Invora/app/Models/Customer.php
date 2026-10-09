<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Customer extends Model
{
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }


    // Add this protected fillable property to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}
