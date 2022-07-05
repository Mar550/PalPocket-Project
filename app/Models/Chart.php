<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Chart extends Model
{
    protected $table = 'chart';

    protected $fillable = ['type','period','from','to'];

    

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'amount' => 'integer',
      ];
      
    public function income() 
    {
        return $this->hasMany(Income::class, 'income_id');
    }

    public function expanse() 
    {
        return $this->hasMany(Expanse::class, 'expanse_id');
    }
}
