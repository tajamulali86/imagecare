<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CompanyType extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function supplier(): HasOne{
        return $this->hasOne(Supplier::class,);
    }
}
