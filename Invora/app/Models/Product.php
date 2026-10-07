<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
