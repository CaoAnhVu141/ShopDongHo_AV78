<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'name',
        'price',
        'discount',
        'image',
        'list_images',
        'id_categories',
        'id_attribute',
        'id_typeproduct',
        'id_trademark',
        'quantity',
        'description',
        'content',
        'quanlity',
        'origin',
        'waterresistance',
        'energy',
        'id'
    ];


    //viết mối quan hệ giữa thuộc tính và sản phẩm 
     
    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'id_attribute');
    }

    //thiết lập mối quan hệ giữa danh mục và sản phẩm
    public function categories()
    {
        return $this->belongsTo(Category::class,'id_categories');
    }

    //thiết lập quan hệ giữa sản phẩm và loại sản phẩm
    public function producttype()
    {
        return $this->belongsTo(ProductType::class,'id_typeproduct');
    }

    //thiết lập mối quan hệ giữa thương hiệu và sản phẩm
    public function trandemark()
    {
        return $this->belongsTo(TradeMark::class,'id_trademark');
    }
}
