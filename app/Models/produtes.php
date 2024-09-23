<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtes extends Model
{
    use HasFactory;
    protected $fillable = [
        'produte_name',
        'descrption',
       
        'section_id'
        

    ];


    // public function produtes()
    // {
    //     return $this->hasMany(produtes::class);
    // }

    public function section()
    {
        return $this->belongsTo(sections::class);
    }
    
}


