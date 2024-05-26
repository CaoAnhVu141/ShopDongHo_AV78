<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = "categoryposts";
    protected $primaryKey = 'id_categorypost';
    protected $fillable = [
        'name',
        'description',
        'id',
    ];

    //mối quan hệ giữa danh mục bài viết và bài viết

    public function posts()
    {
        return $this->hasMany(Post::class,'id_categorypost');
    }
}
