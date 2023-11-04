<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SupplierPrice extends Model
{
    use HasFactory;
    protected $fillable = ['qualification_id','supplier_id',"price"];
        // public function qualifications():belon
        // public function qualifications(): BelongsTo
        // {
        //     return $this->belongsTo(Qualification::class);

        // }
}
