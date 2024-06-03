<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfPay extends Model
{
    use HasFactory;
    protected $table = "typeofpay";
    protected $primaryKey = 'id_pay';
    protected $fillable = [
        'name',
        'description',
        'icon',
        'checkactive'
    ];
}
