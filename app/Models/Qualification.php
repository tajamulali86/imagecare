<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
         'code',
          'status',
           'prerequisite_id',
            'show_on_list',
        'qualification_category_id',
         'qualification_level_id',
         'comment'

    ];

    public function levels(): BelongsTo
    {
        return $this->belongsTo(QualificationLevel::class,'qualification_level_id');
    }

    public function categories():BelongsTo
    {
        return $this->belongsTo(QualificationCategory::class,'qualification_category_id');
    }

    public function prerequisites():BelongsTo
    {
        return $this->belongsTo(Prerequisite::class,'prerequisite_id');
    }
    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class, 'supplier_prices', 'qualification_id', 'supplier_id')
            ->withPivot('price')
            ->withTimestamps();
    }
    public function prices(): HasMany
    {
        return $this->hasMany(SupplierPrice::class);
    }

    public function priceList(): HasOne
    {
        return $this->HasOne(PriceList::class);
    }
}
