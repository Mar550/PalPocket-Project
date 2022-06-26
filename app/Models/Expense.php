<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    protected $table = 'expense';

    protected $dateFormat = 'Y-m-d H:i:s.uO';


    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
