<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $fillable = [
        'item_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
