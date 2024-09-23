<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;
    protected $fillable = [
        'descrption',
        'section_name',
        'created-by'

    ];

    // public function section()
    // {
    //     return $this->belongsTo(sections::class);
    // }
}


