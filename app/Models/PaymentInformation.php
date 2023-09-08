<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PaymentInformation extends Model
{
    use HasFactory;

    // PaymentInformation model
    protected $fillable = [
        'user_id',
        // 'laundry_id',

        'crno',       
        'accountName',
        'accountNumber',
        'bankName',
        'iban',
        'payableDate',
        'payment_method',  
          
        
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function laundry()
    // {
    //     return $this->belongsTo(Laundry::class);
    // }

}


