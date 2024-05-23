<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'typeproducts';
    protected $primaryKey = 'id_typeproduct';
    protected $fillable = [
        'name',
        'description',
        'checktype',
        'id'
    ];
    ///thiết lập mối quan hệ để lấy dữ liệu
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_producttype');
    }

    //thiết lập quan hệ giữa sản phẩm và loại sản phẩm

    public function product()
    {
        return $this->hasMany(Product::class,'id_typeproduct');
    }
}
