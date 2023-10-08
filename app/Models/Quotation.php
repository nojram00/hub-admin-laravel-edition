<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function quotationItems()
    {
        return $this->hasMany(QuotationItem::class);
    }
    public function qItems()
    {
        return $this->belongsTo(QuotationItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
