<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeMark extends Model
{
    use HasFactory;

    protected $table = 'trademarks';
    protected $primaryKey = 'id_trademark';
    protected $fillable = [
        'name',
        'description',
        'checktype',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'id_trademark');
    }
}
