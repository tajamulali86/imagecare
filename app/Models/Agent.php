<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        "name",
          'agent_type_id',
       'agent_contact_id',
       'name',
       'address',
       'email',
       'number',
       'position',
       'company_name',
       'company_type_id',
       'rto_provider_no',
       'cricos_no',
       'company_abn',
       'company_address',
       'company_number',
       'company_landline',
       'company_fax',
       'comment',
       'special_price',

       'added_date',
        ];
    use HasFactory;
}
