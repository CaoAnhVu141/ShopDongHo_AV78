<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';
    protected $primaryKey = 'id_attribute';
    protected $fillable = [
        'name',
        'description',
        'id',
        
    ];

    //thiết lập mối quan hệ giữa thuộc tính và sản phẩm 1-n

    public function product()
    {
        return $this->hasMany(Product::class,'id_attribute');
    }
}
