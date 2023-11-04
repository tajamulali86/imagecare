<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prerequisite extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function qualifications(){
        return $this->hasMany(Qualification::class);
    }
}
