<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    public function incomee() 
    {
        return $this->hasMany(Income::class, 'income_id');
    }

    public function expanse() 
    {
        return $this->hasMany(Expanse::class, 'expanse_id');
    }
}
