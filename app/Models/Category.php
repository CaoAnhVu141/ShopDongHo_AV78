<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = 'id_categories';
    protected $fillable = [
        'name',
        'description',
        'checkstatus',
        'id',
    ];

    //thiết lập mối quan hệ giữa danh mục và sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class,'id_categories');
    }
}
