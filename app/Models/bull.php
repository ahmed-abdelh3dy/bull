<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class bull extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = [
    //     'bull-number',
    //     ' bull-date',
    //     'due-date',
    //     'product',
    //     'discount',
    //     'section',
    //     'section_id',
    //     ' Amount_collection',
    //     'Amount_Commission',
    //     'rate-vat',
    //     'total',
    //     'value-vat',
    //     'status',
    //     'value-status',
    //     'note',


    // ];
    
    protected $fillable = [
        'bull-number' ,
        'bull_date',
        'due_date',
        'product',
        'section',
        'discount',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Rate_VAT',
        'Value_VAT',
        'total',
        'Status',
        'Value_Status',
        'note',
        'user',
    ];


     public function section()
    {
        return $this->belongsTo(sections::class);
    }

}
