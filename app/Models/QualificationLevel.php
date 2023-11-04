<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationLevel extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function qualification(){
        return $this->hasMany(Qualification::class);
    }

}
