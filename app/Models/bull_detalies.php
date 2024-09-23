<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bull_detalies extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bull' ,
        'bull-number' ,  
        'product' ,
        'Section' ,
        'status'  ,
        'value-status' ,
        'note' ,
        'user' ,
    ];
}
