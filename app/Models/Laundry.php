<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
        


class Laundry extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        
        'deliveryCost',        
        'image_header',
        'image_logo',
        'laundryName',
        'laundryPhoneNumber',
        'minimumCharge',           

        'discount',
        'price_list',        
        'rating',
        'separate_qleaning',
        
        'times',
        
    ];

    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}