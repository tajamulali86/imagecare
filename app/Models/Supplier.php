<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
        'number',
        'position',
        'company_name',
        'company_abn',
        'company_type_id',
        'rto_provider_no',
        'cricos_no',
        'company_address',
        'company_number',
        'company_landline',
        'company_fax',
        'added_date',
        'supplier_type_id',
        'comment',
        'supplier_price_id',
    ];
    public function companyType(): BelongsTo
    {
        return $this->belongsTo(CompanyType::class);
    }
    public function supplierType(): BelongsTo
    {
        return $this->belongsTo(SupplierType::class);
    }

    public function supplierContacts(): HasMany
    {
        return $this->hasMany(SupplierContact::class, 'supplier_id');
    }
    public function supplierPrices(): HasMany
    {
        return $this->hasMany(SupplierPrice::class);
    }
    public function qualifications(): BelongsToMany
    {
        return $this->belongsToMany(Qualification::class,'supplier_prices', 'supplier_id', 'qualification_id')
        ->withPivot('price') ->withTimestamps();
    }

}
