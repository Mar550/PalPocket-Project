<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = [];

    protected $table = 'income';

    protected $dateFormat = 'Y-m-d H:i:s.uO';

    public function getAmountAttribute($value) {  
        return $value ?? 0;
    } 

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  
}
