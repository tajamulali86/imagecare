<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceList extends Model
{
    use HasFactory;
    protected $fillable = ['qualification_id','price_list_target_id','price'];
    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }
    public function priceListTarget(): BelongsTo
    {
        return $this->belongsTo(PriceListTarget::class);
    }
}
