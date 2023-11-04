<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PriceListTarget extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function priceList(): HasOne
    {
        return $this->HasOne(PriceList::class);
    }
}
