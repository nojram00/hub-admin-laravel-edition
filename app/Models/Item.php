<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->hasMany(Category::class);
    }
    public function processor()
    {
        return $this->belongsTo(Processor::class);
    }

    public function itemQuotation()
    {
        return $this->hasOne(QuotationItem::class);
    }
}
