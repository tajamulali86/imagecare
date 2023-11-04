<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SupplierContact extends Model
{
    use HasFactory;
    protected $fillable = [
    'supplier_id',
        'name',
        'address',
        'email',
        'number',
        'position',
    ];
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
