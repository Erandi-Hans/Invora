<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }


    // allow mass assignment for these fields
    protected $fillable = [
        'name',
        'code',
        'cost',
        'price',
        'quantity',
        'description'
    ];
}
