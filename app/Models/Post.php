<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; 
    protected $table = "posts";
    protected $primaryKey = 'id_post';
    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'id_categorypost',
        'id',
    ];

    //thực thi mối quan hệ giữa danh mục bài viết và bài viết
    public function categorypost()
    {
        return $this->belongsTo(CategoryPost::class,'id_categorypost');
    }
}




